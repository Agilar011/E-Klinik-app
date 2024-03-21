<x-app-layout>
    <div class="py-12">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Masukkan Data Diri Anda
                        </h1>

                    </div>

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
                                <label for="Tanggal Lahir" class="font-medium text-gray-700">Tanggal Lahir:</label>
                                <input type="date" name="Tanggal Lahir" id="Tanggal Lahir"
                                    value="{{ Auth::user()->tanggal_lahir }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Tinggi Badan" class="font-medium text-gray-700">Tinggi Badan:</label>
                                <input type="text" name="Tinggi Badan" id="Tinggi Badan"
                                    value="{{ Auth::user()->tinggi_badan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Berat Badan" class="font-medium text-gray-700">Berat Badan:</label>
                                <input type="text" name="Berat Badan" id="Berat Badan"
                                    value="{{ Auth::user()->berat_badan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Berat Badan" class="font-medium text-gray-700">Keluhan:</label>
                                <textarea name="keluhan" id="keluhan">{{ Auth::user()->keluhan }}</textarea>
                            </div>
                        </div>

                        <button type="submit"
                        class="bg-green-500 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-green-600">
                            Kirim Pengajuan Pemeriksaan </button>
                </div>
            </div>
        </div>





</x-app-layout>
