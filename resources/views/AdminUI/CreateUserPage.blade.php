<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('CreateUser') }}">
            @include('sweetalert::alert')
            @csrf
            <div>
                <x-label for="nip" value="{{ __('Nip') }}" />
                <x-input id="nip" class="block mt-1 w-full" type="text" name="nip" :value="old('nip')" required
                    autofocus autocomplete="nip" />
            </div>

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="divisi" value="{{ __('Divisi') }}" />
                <select name="divisi" id="divisi" class="block mt-1 w-full">
                    @foreach ($divisi as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-label for="role" value="{{ __('Role') }}" />
                <select id="role" name="role" class="block mt-1 w-full" autocomplete="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="dokter">Dokter</option>
                </select>
            </div>


            <div class="mt-4">
                <x-label for="tanggal_lahir" value="{{ __('Tanggal Lahir') }}" />
                <x-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" required
                    autocomplete="tanggal_lahir" />
            </div>

            <div class="mt-4">
                <x-label for="tinggi_badan" value="{{ __('tinggi_badan') }}" />
                <x-input id="tinggi_badan" class="block mt-1 w-full" type="number" name="tinggi_badan"
                    :value="old('tinggi_badan')" autocomplete="tinggi_badan" />
            </div>

            <div class="mt-4">
                <x-label for="berat_badan" value="{{ __('berat_badan') }}" />
                <x-input id="berat_badan" class="block mt-1 w-full" type="number" name="berat_badan" :value="old('berat_badan')"
                    autocomplete="berat_badan" />
            </div>
            {{-- @php

                $polis = Poli::all();
            @endphp --}}

            <div id="FormPoli" name="FormPoli" class="mt-4">
                <x-label for="poli" value="{{ __('Poli') }}" />
                <select name="poli" id="poli" class="block mt-1 w-full">
                    @foreach ($polis as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
                {{-- <x-input id="poli" class="block mt-1 w-full" type="text" name="poli" :value="old('poli')" required autocomplete="poli" /> --}}
            </div>
{{--
            <div class="mt-4">
                <x-label for="role" value="{{ __('Role') }}" />
                <select id="role" name="role" class="block mt-1 w-full" autocomplete="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="dokter">Dokter</option>
                </select>
            </div> --}}

            <script>
                // Mengambil elemen input form Poli
                const poliInput = document.getElementById('poli');

                // Mengambil elemen input form Role
                const roleInput = document.getElementById('role');

                // Fungsi untuk menampilkan atau menyembunyikan input form Poli berdasarkan nilai peran
                function togglePoliInputVisibility() {
                    // Jika nilai peran adalah 'dokter', tampilkan input form Poli
                    if (roleInput.value.toLowerCase() === 'dokter') {
                        FormPoli.style.display = 'block'; // Tampilkan div FormPoli
                        poliInput.setAttribute('required', true); // Tambahkan atribut required pada input form Poli
                    } else {
                        FormPoli.style.display = 'none'; // Sembunyikan div FormPoli
                        poliInput.removeAttribute('required'); // Hapus atribut required dari input form Poli
                    }
                }

                // Panggil fungsi togglePoliInputVisibility saat halaman dimuat dan ketika nilai peran berubah
                document.addEventListener('DOMContentLoaded', togglePoliInputVisibility);
                roleInput.addEventListener('change', togglePoliInputVisibility);
            </script>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
