<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div id="text">
                <p class="text1">
                    Welcome to PT. PAL Indonesia
                </p>
                <p class="text2">
                    Please Login
                </p>
                {{-- <x-label class="text-center font-semibold font-" value="{{__('Selamat datang di PT PAL') }}" /> --}}
            </div>

            <div>
                <x-label for="email" class="ml-3" value="{{ __('NIP') }}" />
                {{-- <label for="email" class="block text-sm font-medium text-gray-700">Please Enter Your NIP</label> --}}
                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Please Enter Your NIP"/>
            </div>

            <div class="mt-4">
                <x-label for="password" class="ml-3" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Please Enter Your Password"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4 flex justify-center">
                <x-button class="ms-4 mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M10.707 4.293a1 1 0 010 1.414L6.414 10l4.293 4.293a1 1 0 11-1.414 1.414l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Back') }}
                </x-button>

                <x-button class="ms-4 ml-6">
                    {{ __('Login') }}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M9.293 15.293a1 1 0 010-1.414L13.586 10 9.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>  
                </x-button>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<style>
    #text .text1 {
        text-align: center;
        font-size: 23px;
        font-weight: bold;
    }

    #text .text2 {
        text-align: center;
        font-size: 19px;
        color: rgb(116, 116, 116);
    }
</style>