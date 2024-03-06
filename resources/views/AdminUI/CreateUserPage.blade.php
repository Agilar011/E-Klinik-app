<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Masukkan Perubahan Data User {{ $user->name }}
                        </h1>

                    </div>

                    <form action="{{ route('UpdateUser', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                            <div class="flex flex-col space-y-2">
                                <label for="nip" class="font-medium text-gray-700">NIP:</label>
                                <input type="text" name="nip" id="nip" value="{{ $user->nip }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="name" class="font-medium text-gray-700">Name:</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="divisi" class="font-medium text-gray-700">Divisi:</label>
                                <input type="text" name="divisi" id="divisi" value="{{ $user->divisi }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>


                            <div class="flex flex-col space-y-2">
                                <label for="tanggal_lahir" class="font-medium text-gray-700">Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                    value="{{ $user->tanggal_lahir }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="tinggi_badan" class="font-medium text-gray-700">Tinggi Badan:</label>
                                <input type="text" name="tinggi_badan" id="tinggi_badan"
                                    value="{{ $user->tinggi_badan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="berat_badan" class="font-medium text-gray-700">Berat Badan:</label>
                                <input type="text" name="Berat Badan" id="Berat Badan"
                                    value="{{ $user->berat_badan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

            <div id="FormPoli" name="FormPoli" class="mt-4">
                <x-label for="poli" value="{{ __('Poli') }}" />
                <select name="poli" id="poli" class="block mt-1 w-full">
                    @foreach ($polis as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

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



            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>

                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
                            Simpan Perubahan
                        </button>

                </div>
            </div>
        </div>





</x-app-layout>
