<x-app-layout>
    <div class="py-12 pt-[90px]">
        <div class="my-auto mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4">
                    <h1 class="text-2xl font-medium text-gray-900">Masukkan Data Poli Baru</h1>
                </div>

                <form action="{{ route('CreatePoli') }}" method="POST">
                    @csrf
                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="font-medium text-gray-700">Nama Poli:</label>
                            <input type="text" name="name" id="name" value=""
                                class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                required>
                        </div>
                    </div>
                    <div class="p-4 flex justify-between">
                        <button type="button" onclick="window.history.back()"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
