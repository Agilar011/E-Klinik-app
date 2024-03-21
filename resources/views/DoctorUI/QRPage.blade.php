<x-app-layout>
    <div class="py-12">
        <div class="min-h-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-yellow-200 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-10 lg:p-10 bg-gray-200 border-b border-gray-200 justify-center ">
                    <div>
                        <img src="qrcode/{{ $QR}}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
</x-app-layout>
