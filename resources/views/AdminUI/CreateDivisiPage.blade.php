<x-app-layout>
    <div class="py-12 pt-[90px]">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3 lg:p-6 bg-white">
                    <div class="p-3 lg:p-4 bg-white ">
                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="text-2xl font-medium text-gray-900">
                            Masukkan Data Divisi Baru
                        </h1>

                    </div>

                    <form action="{{ route('CreateDivisi') }}" method="POST">
                        @csrf
                        {{-- @method('PUT') --}}

                        <div class="bg-gray-400 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 w-auto rounded-[15px] mb-10">

                            <div class="flex flex-col space-y-2">
                                <label for="name" class="font-medium text-gray-700">Nama Divisi:</label>
                                <input type="text" name="name" id="name" value=""
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500 w-full">
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-400 hover:bg-blues-600 text-white font-bold py-2 px-4 rounded-full">
                            Simpan Perubahan
                        </button>

                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        @include('sweetalert::alert')
</x-app-layout>
