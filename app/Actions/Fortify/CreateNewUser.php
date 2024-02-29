<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            // 'id' => ['required', 'string', 'max:255', 'unique:users'],
            'nip' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'divisi' => ['required', 'string', 'max:255'],
            'role' => ['string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'tinggi_badan' => ['numeric'],
            'berat_badan' => ['numeric'],
            // 'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();     
        // dd($input['divisi']);
        $divisi= $input['divisi'];

        $carbonDate = Carbon::parse($input['tanggal_lahir']);
        $defaultPassword = $carbonDate->format('d-m-Y');
        $defaultPassword = str_replace('-', '', $defaultPassword);

        return User::create([
            'nip' => $input['nip'],
            'name' => $input['name'],
            'divisi' => $divisi,
            'role' => $input['role'],
            'tanggal_lahir' => $input['tanggal_lahir'],
            'tinggi_badan' => $input['tinggi_badan'],
            'berat_badan' => $input['berat_badan'],
            'password' => Hash::make($defaultPassword),
        ]);
    }
}
