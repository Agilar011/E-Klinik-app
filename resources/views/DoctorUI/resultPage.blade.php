<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="text-2xl mb-5">
                        Data pasien ditemukan
                    </h1>
                    <div class="p-4 bg-gray-100 shadow-md rounded-md">
                                <table>
                                    <tr>
                                        <td class="py-5 pr-10">NIP</td>
                                        <td class="py-2">{{ $value->nip }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-5 pr-10">Nama</td>
                                        <td class="py-2">{{ $value->pasien }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-5 pr-10">Divisi</td>
                                        <td class="py-2">{{ $value->divisi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-5 pr-10">Keluhan</td>
                                        <td class="py-2">{{ $value->keluhan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-5 pr-10">Tanggal Pemeriksaan</td>
                                        <td class="py-2">{{ $value->tglpemeriksaan }}</td>
                                    </tr>
                                </table>
                    </div>
                    <div class="flex justify-center items-center p-5 mt-10 w-full">
                        <a href="/scan-qr-code">
                            <button class=" text-xl bg-blue-300 text-white px-4 py-1 rounded-lg hover:bg-blue-600">Back</button>
                        </a>
                    </div>



            </div>
        </div>





</x-app-layout>
