<x-app-layout>
    <div class="py-12">
        <div class=" mt-[60px] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3 lg:p-4 bg-white border-b border-gray-200">
                    <div class="p-3 lg:p-4 bg-white border-b border-gray-200">
                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="text-2xl font-medium text-gray-900">
                            Masukkan Perubahan Data {{ $divisi->name }}
                        </h1>

                    </div>

                    <form action="{{ route('UpdateDivisi', $divisi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                            <div class="flex flex-col space-y-2">
                                <label for="name" class="font-medium text-gray-700">Nama:</label>
                                <input type="text" name="name" id="name" value="{{ $divisi->name }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>
                        </div>

                        <div class="flex justify-center gap-10">
                            <button type="button" onclick="window.history.back()"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">
                                Batal
                            </button>

                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
                                Simpan
                            </button>
                        </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
</x-app-layout>
