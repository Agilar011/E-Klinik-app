<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3 lg:p-3 bg-white border-b border-gray-200">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="text-2xl font-medium text-gray-900">
                            Masukkan Perubahan Data User {{ $user->name }}
                        </h1>

                    </div>

                    <form action="{{ route('UpdateUser', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="bg-gray-400 rounded-xl grid">
                            <div
                                class=" grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                                <div class="flex flex-col space-y-2">
                                    <label for="nip" class="font-bold text-black">NIP:</label>
                                    <input type="text" name="nip" id="nip" value="{{ $user->nip }}"
                                        class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                                </div>

                                <div class="flex flex-col space-y-2">
                                    <label for="name" class="font-bold text-black">Name:</label>
                                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                                        class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                                </div>

                                <div class="flex flex-col space-y-2">
                                    <label for="divisi" class="font-bold text-black">Divisi:</label>
                                    <input type="text" name="divisi" id="divisi" value="{{ $user->divisi }}"
                                        class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                                </div>


                                <div class="flex flex-col space-y-2">
                                    <label for="tanggal_lahir" class="font-bold text-black">Tanggal Lahir:</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{ $user->tanggal_lahir }}"
                                        class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                                </div>

                                <div class="flex flex-col space-y-2">
                                    <label for="tinggi_badan" class="font-bold text-black">Tinggi Badan:</label>
                                    <input type="text" name="tinggi_badan" id="tinggi_badan"
                                        value="{{ $user->tinggi_badan }}"
                                        class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                                </div>

                                <div class="flex flex-col space-y-2">
                                    <label for="berat_badan" class="font-bold text-black">Berat Badan:</label>
                                    <input type="text" name="Berat Badan" id="Berat Badan"
                                        value="{{ $user->berat_badan }}"
                                        class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                                </div>



                                <div class="flex flex-col space-y-2 ">
                                    <label for="role" class="font-bold text-black">Role:</label>
                                    <select name="role" id="role">
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User
                                        </option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="dokter" {{ $user->role === 'dokter' ? 'selected' : '' }}>Doctor
                                        </option>

                                        <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-cols-2 justify-center p-3 ">
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-8 rounded-full m-auto">
                                    Batal
                                </button>

                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-8 rounded-full m-auto">
                                    Simpan Perubahan
                                </button>
                            </div>


                        </div>

                        {{-- <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                            <div class="flex flex-col space-y-2">
                                <label for="nip" class="font-medium text-black">NIP:</label>
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



                            <div class="flex flex-col space-y-2">
                                <label for="role">Role:</label>
                                <select name="role" id="role">
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="dokter" {{ $user->role === 'dokter' ? 'selected' : '' }}>Doctor
                                    </option>

                                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                </select>
                            </div>
                        </div>

                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
                            Simpan Perubahan
                        </button> --}}

                </div>
            </div>
        </div>





</x-app-layout>
