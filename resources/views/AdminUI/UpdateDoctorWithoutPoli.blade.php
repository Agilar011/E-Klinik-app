<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Masukkan Perubahan Data Dokter') }} {{ $user->name }}
                    </h2>
                    <form action="{{ route('UpdateDoctorWithoutPoli', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                            <div class="flex flex-col space-y-2">
                                <label for="name" class="font-medium text-gray-700">Nama Dokter:</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>
                            <div class="flex flex-col space-y-3">
                                <x-label for="DoctorPoli" :value="__('Pilih Poli: ')" />
                                <select name="DoctorPoli" id="DoctorPoli"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                                    @foreach ($poli as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-center gap-10 pb-5 rounded-bl-xl rounded-br-xl">

                            <button type="button" onclick="window.history.back()"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">
                                Batal
                            </button>

                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
