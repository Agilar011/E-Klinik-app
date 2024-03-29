<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-label for="nip" value="{{ __('Nip') }}" />
                <x-input id="nip" class="block mt-1 w-full" type="text" name="nip" :value="old('nip')" required autofocus autocomplete="nip" />
            </div>

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="divisi" value="{{ __('Divisi') }}" />
                <x-input id="divisi" class="block mt-1 w-full" type="text" name="divisi" :value="old('divisi')" required autocomplete="divisi" />
            </div>

            <div class="mt-4">
                <x-label for="role" value="{{ __('role') }}" />
                <x-input id="role" class="block mt-1 w-full" type="text" name="role" :value="old('role')"  autocomplete="role" />
            </div>

            <div class="mt-4">
                <x-label for="tanggal_lahir" value="{{ __('Tanggal Lahir') }}" />
                <x-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" required autocomplete="tanggal_lahir" />
            </div>

            <div class="mt-4">
                <x-label for="tinggi_badan" value="{{ __('tinggi_badan') }}" />
                <x-input id="tinggi_badan" class="block mt-1 w-full" type="number" name="tinggi_badan" :value="old('tinggi_badan')"  autocomplete="tinggi_badan" />
            </div>

            <div class="mt-4">
                <x-label for="berat_badan" value="{{ __('berat_badan') }}" />
                <x-input id="berat_badan" class="block mt-1 w-full" type="number" name="berat_badan" :value="old('berat_badan')"  autocomplete="berat_badan" />



            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Kirim Pengajuan Pemeriksaan </button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
