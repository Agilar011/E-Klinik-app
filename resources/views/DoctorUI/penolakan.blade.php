<x-app-layout>
    <div class="py-12">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Pilih Poli yang Anda Inginkan
                        </h1>

                        {{-- <p class="mt-6 text-gray-500 leading-relaxed">
                            Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                            to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                            you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                            ecosystem to be a breath of fresh air. We hope you love it.
                        </p> --}}
                    </div>

                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                        @foreach ($polis as $item)
                            <div>

                                <div>
                                    <a href="{{ route('poli.show', $item->name) }}">{{ $item->name }}</a>
                                    </a>

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>





</x-app-layout>
