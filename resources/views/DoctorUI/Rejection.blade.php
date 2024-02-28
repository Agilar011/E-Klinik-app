<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Lengkapi Data Persetujuan Yang Diperlukan
                    </h1>

                    @php
                    $datapoli = App\Models\Poli::where('id', $pengajuan->idpoli)->first();
                    $datauser = App\Models\User::where('nip', $pengajuan->nip)->first();
                    $idpengajuan = $pengajuan->id;
                    // dd($idpengajuan);
                @endphp


                    {{-- <form action="{{ route('setujuipengajuan', $pengajuan->id) }}" method="POST"> --}}
                        <form action="{{ route('tolakpengajuan', $idpengajuan)}}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- @php
                        dd($idpengajuan);

                        @endphp --}}

                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">Poli yang dituju:</label>
                                <input type="text" name="idpoli" id="idpoli" value="{{ $datapoli->name }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="name" class="font-medium text-gray-700">Name:</label>
                                <input type="text" name="name" id="name" value="{{ $datauser->name }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="divisi" class="font-medium text-gray-700">Divisi:</label>
                                <input type="text" name="divisi" id="divisi" value="{{ $datauser->divisi }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Tanggal Lahir" class="font-medium text-gray-700">Tanggal Lahir:</label>
                                <input type="date" name="Tanggal Lahir" id="Tanggal Lahir"
                                    value="{{ $datauser->tanggal_lahir }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Tinggi Badan" class="font-medium text-gray-700">Tinggi Badan:</label>
                                <input type="text" name="Tinggi Badan" id="Tinggi Badan"
                                    value="{{ $datauser->tinggi_badan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Berat Badan" class="font-medium text-gray-700">Berat Badan:</label>
                                <input type="text" name="Berat Badan" id="Berat Badan"
                                    value="{{ $datauser->berat_badan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Catatan Doctor" class="font-medium text-gray-700">Catatan Untuk Pasien:</label>
                                <input type="text" name="catatan_dokter" id="catatan_dokter" value="{{ $pengajuan->catatan_dokter }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    >

                            </div>

                            {{-- <div class="flex flex-col space-y-2">
                                <label for="tglpemeriksaan" class="font-medium text-gray-700">Tanggal Pemeriksaan:</label>
                                <input type="date" name="tglpemeriksaan" id="tglpemeriksaan">
                            </div> --}}
                        </div>

                        <div class="flex justify-between mt-4">
                            <button type="button" onclick="window.history.back()"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                Back
                            </button>
                            <button type="submit"
                            style="background-color: #4CAF50; /* Green */
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        margin: 4px 2px;
                        cursor: pointer;
                        border-radius: 10px;">Tolak Pengajuan
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
