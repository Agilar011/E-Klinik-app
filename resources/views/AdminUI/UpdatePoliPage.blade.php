<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Masukkan Perubahan Poli
                        </h1>

                    </div>

                    <form action="{{ route('UpdatePoli', $datapoli->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                            {{-- <div class="flex flex-col space-y-2">
                                <label for="dokter" class="font-medium text-gray-700">Nama:</label>
                                <input type="text" name="dokter" id="dokter" value="{{ $dokter->name }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div> --}}

                            <div class="flex flex-col space-y-2 ">
                                <label for="dokter" class="font-bold text-black">Nama Dokter:</label>
                                <select name="dokter" id="dokter">
                                    @foreach ($dokters as $item)
                                    <option value="{{ $item->name }}" {{ $dokter->name === $item->name ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach



                                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                </select>
                            </div>

                            <div class="flex flex-col space-y-2 ">
                                <label for="poli" class="font-bold text-black">Poli:</label>
                                <select name="poli" id="poli">
                                    @foreach ($polis as $item)
                                    <option value="{{ $item->name }}" {{ $poli->name === $item->name ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach



                                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                </select>
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
