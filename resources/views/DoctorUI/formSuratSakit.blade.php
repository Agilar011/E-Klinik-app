<x-app-layout>
    <div class="py-12 pt-[90px]">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3 lg:p-4 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-medium text-gray-900">
                        Lengkapi Data Surat Sakit
                    </h1>

                    @php
                        $datapoli = App\Models\Poli::where('id', $pengajuan->idpoli)->first();
                        $datauser = App\Models\User::where('nip', $pengajuan->nip)->first();
                        $idpengajuan = $pengajuan->id;
                    @endphp


                    {{-- <form action="{{ route('setujuipengajuan', $pengajuan->id) }}" method="POST"> --}}
                    <form action="{{ route('setujuipengajuan', $idpengajuan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- @php
                        dd($idpengajuan);

                        @endphp --}}

                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">No Surat:</label>
                                <input type="text" name="idpoli" id="idpoli" value=""
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    required>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="name" class="font-medium text-gray-700">Name:</label>
                                <input type="text" name="name" id="name" value="{{ $datauser->name }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

<div class="flex flex-col space-y-2">
    <label for="tglpemeriksaan" class="font-medium text-gray-700">Umur:</label>
    <input type="number" name="tglpemeriksaan" id="tglpemeriksaan"
        value="{{ $umur }}">

</div>

                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">Pangkat /Gol:</label>
                                <input type="text" name="idpoli" id="idpoli" value=""
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    required>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">NIP:</label>
                                <input type="text" name="idpoli" id="idpoli" value="{{ $datauser->nip }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    required>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">Cost Centre:</label>
                                <input type="text" name="idpoli" id="idpoli" value=""
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    required>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">Jumlah Hari Izin:</label>
                                <input type="number" name="idpoli" id="idpoli" value="{{ $request->jumlahhari }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    required>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">Alasan:</label>
                                <input type="text" name="idpoli" id="idpoli" value=""
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    required>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">Keterangan:</label>
                                <input type="text" name="idpoli" id="idpoli" value=""
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    required>
                            </div>







                            <div class="flex flex-col space-y-2">
                                <label for="divisi" class="font-medium text-gray-700">Divisi:</label>
                                <input type="text" name="divisi" id="divisi" value="{{ $datauser->divisi }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="tglpemeriksaan" class="font-medium text-gray-700">Tanggal
                                    Pemeriksaan:</label>
                                <input type="date" name="tglpemeriksaan" id="tglpemeriksaan"
                                    value="{{ $pengajuan->tglpemeriksaan }}">

                            </div>
                        </div>

                        <div class="flex justify-between mt-4">
                            <button type="button" onclick="window.history.back()"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                Back
                            </button>
                            <button type="submit"
                                class="bg-green-500 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-green-600">
                                Terima Pengajuan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
