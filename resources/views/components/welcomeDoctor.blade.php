<div class
="p-6 lg:p-8 bg-white border-b border-gray-200 h-full " style="background: url('/images/GmrQcB.jpg') no-repeat center center fixed; background-size: cover;">
    {{-- <x-application-logo class="block h-12 w-auto" /> --}}

    <h1 class="mt-8 text-5xl font-medium text-gray-900 text-center">
        <strong>Welcome Doctor di website E-klinik PT. PAL Indonesia</strong>
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 text-2xl text-center">
        <div>
            E-Klinik PT.PAL berdesikasi untuk membantu memperoleh fasilitas dan pelayanan Kesehatan yang Baik 
        </div>

        <div style="display: flex; justify-content: center; align-items: center; height: 10vh; flex-direction: grid; gap: 6px;">
            <button class="bg-green-500 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-green-600 ">
                <a href="/antrianpengajuan">Lihat Daftar Pengajuan</a>
            </button>
            <button class="bg-green-500 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-green-600">
                <a href="{{ route('Doctor.UserPage') }}">Ajukan Pemeriksaan</a>
            </button>
        </div>
    </div>
</div>
