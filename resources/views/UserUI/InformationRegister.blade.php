<x-app-layout>
    <div class="py-6 pt-[75px]">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="pt-10 pb-4 px-8 bg-white border-b border-gray-200">
                    {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                    <h1 class=" text-2xl font-medium text-gray-900">
                        Masukkan Data Diri Anda
                    </h1>


                    <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">Poli yang dituju:</label>
                                <input type="text" name="idpoli" id="idpoli" value="{{ $polis }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="name" class="font-medium text-gray-700">Name:</label>
                                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="divisi" class="font-medium text-gray-700">Divisi:</label>
                                <input type="text" name="divisi" id="divisi" value="{{ Auth::user()->divisi }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>


                            <div class="flex flex-col space-y-2">
                                <label for="tanggal_lahir" class="font-medium text-gray-700">Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                    value="{{ Auth::user()->tanggal_lahir }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="tinggi_badan" class="font-medium text-gray-700">Tinggi Badan:</label>
                                <input type="text" name="tinggi_badan" id="tinggi_badan"
                                    value="{{ Auth::user()->tinggi_badan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="berat_badan" class="font-medium text-gray-700">Berat Badan:</label>
                                <input type="text" name="berat_badan" id="berat_badan"
                                    value="{{ Auth::user()->berat_badan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="keluhan" class="font-medium text-gray-700">Keluhan:</label>
                                <textarea name="keluhan" id="keluhan" required>{{ Auth::user()->keluhan }}</textarea>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="tglpemeriksaan" class="font-medium text-gray-700">Tanggal
                                    Pemeriksaan:</label>
                                <input type="date" name="tglpemeriksaan" id="tglpemeriksaan"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500" required>
                            </div>

                        </div>
                        <button type="button" onclick="window.history.back()"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            Back
                        </button>
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Kirim Pengajuan Pemeriksaan </button>
                </div>

            </div>
        </div>





</x-app-layout>
