<x-app-layout>
    <div class="py-12">
        <div class="min-h-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-yellow-200 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-10 lg:p-10 bg-gray-200 border-b border-gray-200 justify-center ">
                    <h1 class="text-2xl font-bold text-center">Informasi Pengajuan Check Up Kesehatan</h1>

                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-1/2 p-10 bg-gray-200 border-b border-gray-200 justify-center">
                            <table class="text-2xl font-bold">
                                <tbody>
                                    <tr>
                                        <td class="max-w-cell align-top pr-2">Nama Pasien</td>
                                        <td class="text-right align-top pr-2">: </td>
                                        <td class="text-left pb-5">{{ $QR->nip_name }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="max-w-cell align-top pr-2">Divisi</td>
                                        <td class="text-right align-top pr-2">: </td>
                                        <td class="text-left pb-5">
                                            {{ $QR->nip_divisi }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="max-w-cell align-top pr-2">Tanggal Lahir</td>
                                        <td class="text-right align-top pr-2">: </td>
                                        <td class="text-left pb-5">
                                            {{ $QR->nip_tgl_lahir }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="max-w-cell align-top pr-2">Tanggal Pemeriksaan</td>
                                        <td class="text-right align-top pr-2">: </td>
                                        <td class="text-left pb-5">
                                            {{ $QR->tglpemeriksaan }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="max-w-cell align-top pr-2">Poli</td>
                                        <td class="text-right align-top pr-2">: </td>
                                        <td class="text-left pb-5">
                                            {{ $QR->idpoli_name }}
                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="max-w-cell align-top pr-2">Keluhan</td>
                                        <td class="text-right align-top pr-2">: </td>
                                        <td class="text-left pb-5">
                                            {{ $QR->keluhan }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="max-w-cell align-top pr-2">Ditangani Oleh</td>
                                        <td class="text-right align-top pr-2">: </td>
                                        <td class="text-left pb-5">
                                            Dr {{ $QR->dokter_name }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <script>
                                window.onload = function() {
                                    // Ambil semua elemen div dengan kelas 'div-event' yang ingin dihitung tinggi maksimumnya
                                    var divs = document.querySelectorAll('.max-w-cell');

                                    // Inisialisasikan variabel untuk menyimpan tinggi maksimum
                                    var maxWidth = 0;

                                    // Iterasi melalui semua elemen div untuk menemukan tinggi maksimum
                                    divs.forEach(function(div) {
                                        // Dapatkan tinggi aktual dari setiap elemen div
                                        var divWidth = div.offsetWidth;

                                        // Bandingkan tinggi aktual dengan tinggi maksimum yang saat ini disimpan
                                        if (divWidth > maxWidth) {
                                            maxWidth = divWidth; // Jika tinggi aktual lebih besar, atur sebagai tinggi maksimum baru
                                        }
                                    });

                                    // Atur tinggi maksimum ke semua elemen div yang memiliki kelas 'div-event'
                                    divs.forEach(function(div) {
                                        div.style.Width = maxWidth + 'px';
                                    });
                                }
                            </script>
                        </div>
                        <div class="w-full lg:w-1/2 p-10 bg-gray-200 border-b border-gray-200 justify-center">
                            <div class="flex justify-center items-center">
                                <img src="{{ asset('qrcodes/' . $QR->qrcode) }}" alt="QR Code"
                                    class="max-w-full h-auto">
                            </div>
                        </div>
                    </div>


                    <div class="mt-4 flex justify-center">
                        <a href="{{ route('dashboard') }}"
                            class="inline-block bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</x-app-layout>
