    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 h-full relative"
    style="background: url('/img/bg-dokter.jpg') no-repeat center center fixed; background-size: cover;">
    {{-- <div class="flex flex-col justify-center items-center min-h-2/3"> --}}
        <div class="flex flex-col justify-center items-center" style="min-height: calc(100vh * 2 / 3);">

        <h1 class="mt-8 text-5xl font-medium text-gray-900 text-center">
                <div style="font-size: 40px;" class=" mx-auto font-black">
                    Welcome Doctor di website E-klinik PT. PAL Indonesia
                </div>
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 text-2xl text-center">
                <div style="font-size: 30px;" class="w-1/2 mx-auto mt-10" >
                    E-Klinik PT.PAL berdesikasi untuk membantu memperoleh fasilitas dan pelayanan Kesehatan yang Baik
                </div>
                <div class="justify-between bottom-0 w-full">
                    <div class="flex justify-around py-2 px-40">
                        <button class="bg-green-500 text-white px-8 py-2 text-center text-base font-bold rounded-lg shadow-md hover:bg-green-600 focus:outline-none">
                            <a href="/antrianpengajuan">Lihat Daftar Pengajuan</a>
                        </button>
                        <button class="bg-green-500 text-white px-8 py-2 text-center text-base font-bold rounded-lg shadow-md hover:bg-green-600 focus:outline-none">
                            <a href="{{ route('Doctor.UserPage') }}">Ajukan Pemeriksaan</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
