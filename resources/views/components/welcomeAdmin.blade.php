<div class="p-6 lg:p-8 grid justify-center items-center" style="min-height: calc(100vh * 2 / 3);"
    {{-- style="background-image: url('/img/KapalRS.jpg'); background-repeat: no-repeat; background-size: cover;" --}}
    >
    {{-- <x-application-logo class="block h-12 w-auto" /> --}}
    <div class="bg-gray-200 rounded-xl pt-10">
        <div class=" mx-auto rounded-xl font-extrabold">
            <h1 class="text-4xl font-medium text-gray-900 w-auto mx-auto text-center mb-4">
                @auth
                    Welcome Admin {{ Auth::user()->name }} di E-Klinik PT.PAL Indonesia
                @else
                    Welcome di E-Klinik Pt.PAL Indonesia
                @endauth
            </h1>
            <div class=" text-2xl text-gray-800 max-w-[830px] text-center mx-auto">
                E-Klinik PT.PAL berdedikasi untuk membantu memperoleh fasilitas dan pelayanan Kesehatan yang Baik
            </div>
        </div>




        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8 text-black mx-auto">

            <x-nav-link href="{{ route('ShowUser') }}" :active="request()->routeIs('ShowUser')">
                <button
                class="bg-blue-500 max-w-[310px] max-h-[257px] rounded-[20px] text-center justify-item flex flex-col items-center justify-center text-lg p-20">
                <img src="/img/Daftar user.png" alt="Logo Client 1" class="w-50 mb-2">
                <br>
                Daftar User
            </button>
            </x-nav-link>
            <x-nav-link href="{{ route('ShowPoli') }}" :active="request()->routeIs('ShowPoli')">
                <button
                class="bg-blue-500 max-w-[310px] max-h-[257px] rounded-[20px] text-center justify-item flex flex-col items-center justify-center text-lg p-20">
                <img src="/img/daftar poli.png" alt="Logo Client 1" class="w-50 mb-2">
                <br>
                Daftar Poli
            </button>
            </x-nav-link>
            <x-nav-link href="{{ route('ShowDivisi') }}" :active="request()->routeIs('ShowDivisi')">
                <button
                class="bg-blue-500 max-w-[310px] max-h-[257px] rounded-[20px] text-center justify-item flex flex-col items-center justify-center text-lg p-20">
                <img src="/img/daftar divisi.png" alt="Logo Client 1" class="w-50 mb-2">
                <br>
                Daftar Divisi
            </button>
            </x-nav-link>






        </div>

    </div>


</div>

{{--
<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8">

    <button class="bg-white max-w-[310px] max-h-[257px] rounded-[20px] text-center ">
        Daftar User
    </button>
    <button class="bg-white max-w-[310px] max-h-[257px] rounded-[20px] text-center ">
        Daftar Poli
    </button>
    <button class="bg-white max-w-[310px] max-h-[257px] rounded-[20px] text-center ">
        Daftar Divisi
    </button>

</div> --}}
