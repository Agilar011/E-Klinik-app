<x-app-layout>
    <div class="py-12 pt-[90px]">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('generate.pdf') }}" method="POST">
                @csrf
                <input type="hidden" name="content" value="{{ json_encode($content) }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kirim</button>
            </form>
            <div name="lembarIzin" class="w-[21cm]">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <div class="p-3 lg:p-4 bg-white">
                        <img src="/img/pal-logo.png" alt="Logo Klinik" class="h-20 w-auto pb-5">
                        <h1 class="text-lg font-medium text-gray-900 pb-10">
                            No: {{ $request->noSurat }}
                        </h1>
                        <div class="flex justify-center text-center ">
                            <p class="text-3xl border-b border-black">SURAT KETERANGAN DOKTER</p>
                        </div>

                        <div class="p-3 lg:p-4 bg-white">
                            <p class="text-justify">
                                Yang bertanda tangan di bawah ini, Dokter Puskesmas Pekayon, menerangkan bahwa:
                            </p>
                        </div>

                        <div class="flex justify-between px-20 pb-5">
                            <div class="flex font-bold">Nama:&nbsp;
                                <p class="font-light">{{ $request->name }}</p>
                            </div>

                            <div class="flex font-bold">Umur:&nbsp;
                                <p class="font-light">{{ $request->umur }}</p>
                            </div>
                        </div>

                        <div class="flex justify-between px-20 pb-5">
                            <div class="flex font-bold">Pangkat:&nbsp;
                                <p class="font-light">{{ $request->pangkat }}</p>
                            </div>

                            <div class="flex font-bold">NIP:&nbsp;
                                <p class="font-light">{{ $request->NIPPasien }}</p>
                            </div>
                        </div>

                        <div class="flex justify-between px-20 pb-5">
                            <div class="flex font-bold">Bagian:&nbsp;
                                <p class="font-light">{{ $request->divisi }}</p>
                            </div>
                        </div>

                        <div class="flex justify-between px-20 pb-5">
                            <div class="flex font-bold">Cost Centre:&nbsp;
                                <p class="font-light">{{ $request->cost }}</p>
                            </div>
                        </div>

                        <div class="flex justify-between px-20 pb-5">
                            <div class="flex font-bold">Perlu mendapatkan istirahat/Dinas ringan selama:&nbsp;
                                <p class="font-light">{{ $request->jumlahHariIzin }}</p>
                            </div>

                            <div class="flex font-bold"> hari terhitung mulai
                            </div>
                        </div>

                        <div class="flex justify-between px-20 pb-5">
                            <div class="flex font-bold">Tanggal:&nbsp;
                                <p class="font-light">{{ $tglmulai }}</p> &nbsp;s/d&nbsp; <p class="font-light">{{ $tglakhir }}</p>
                            </div>

                            <div class="flex font-bold">Karena menderita sakit.
                            </div>
                        </div>

                        <div class="flex justify-between px-20 pb-5">
                            <div class="flex font-bold">Keterangan Lain-lain:&nbsp;
                                <p class="font-light">{{ $request->keterangan }}
                            </p>
                            </div>
                        </div>

                        <div class="text-right px-20 items-right">
                            <div style="float: right; text-align: right;">
                                <div name="dataDokter" class="text-center items-center">
                                    <p>Tanggal : {{ $request->tglpemeriksaan }}</p>

                                    <p class="pb-5">
                                        Dokter yang memeriksa
                                    </p>

                                    <div style="display: flex; justify-content: center;">
                                        <img src="/images/1 00000000 2022-11-15.png" alt="TTD"
                                            class="h-20 w-auto items-center">
                                    </div>

                                    <p class="pb-5">
                                        Dr {{ auth()->user()->name }}
                                    </p>
                                </div>
                            </div>
                        </div>













                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
