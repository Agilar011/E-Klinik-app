<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Pilih Poli yang Anda Inginkan
                        </h1>
                    </div>

                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8">
                        @foreach ($polis as $item)
                        <a href="{{ route('poli.show', $item->name) }}"><div>

                            <div class="bg-white-500 hover:bg-gray-600 text-black font-bold py-2 px-4 rounded border border-black text-center">
                                {{ $item->name }}
                            </div>
                        </div>
                    </a>
                                    </a>

                        @endforeach

                    </div>
                    <button type="button" onclick="window.history.back()"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        Back
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
