<x-app-layout>
    <div class="py-12">
        <div class="min-h-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-yellow-200 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-10 lg:p-10 bg-gray-200 border-b border-gray-200 justify-center ">
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('qrcodes/' . $QR) }}" alt="QR Code" class="max-w-full h-auto">
                    </div>
                    <div class="mt-4 flex justify-center">
                        <a href="{{ route('dashboard') }}" class="inline-block bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</x-app-layout>
