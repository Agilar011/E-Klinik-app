<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="text-2xl font-medium text-gray-900">
        Welcome, {{ Auth::user()->name }}
    </h1>

    <div class="overflow-x-auto mt-6">


        <style>
            .custom-table {
                border-collapse: separate;
                border-spacing: 0 0.5rem;
                /* Menentukan jarak vertikal antara baris (0.5 rem disini, bisa disesuaikan) */
            }
        </style>


        <table class="custom-table w-full text-center">
            <thead class="bg-gray-300">
                <th class="border px-4 py-2 text-left">Nama Pengajuan</th>
                <th class="border px-4 py-2 text-left">Poli</th>
                <th class="border px-4 py-2 text-left">Waktu Pengajuan</th>
                <th class="border px-4 py-2 text-left">Keluhan</th>
                <th class="border px-4 py-2 text-left">Catatan</th>
                <th class="border px-4 py-2 text-left">Status</th>
                <th class="border px-4 py-2 text-left">Keterangan</th>
            </thead>
            @php
                // Mendapatkan daftar pengajuan check up berdasarkan NIP pengguna saat ini
                $pengajuanCheckUps = App\Models\PengajuanCheckUp::where('nip', Auth::user()->nip)
                    ->orderBy('created_at', 'desc') // Urutkan berdasarkan waktu pengajuan dari yang terbaru
                    ->paginate(5);
            @endphp

            <tbody>

                @foreach ($pengajuanCheckUps as $key => $item)
                    @php
                        $id = App\Models\User::where('id', $item->id)->first();
                    @endphp

                    @if ($item->status == 'rejected')
                        <tr class="m-2 bg-red-400">
                            <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                            <td class="border px-4 py-2">{{ $item->poli->name }}</td>
                            <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td class="border px-4 py-2">{{ $item->keluhan }}</td>
                            <td class="border px-4 py-2">{{ $item->catatan_dokter }}</td>
                            <td class="border px-4 py-2">{{ $item->status }}</td>
                            <td class="border px-4 py-2 ">
                                <div class="bg-red-500 text-center p-2">
                                    Pengajuan anda telah Ditolak

                                </div>
                            </td>
                        </tr>
                    @elseif ($item->status == 'approved')
                        <tr class="m-2 bg-green-400">
                            <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                            <td class="border px-4 py-2">{{ $item->poli->name }}</td>
                            <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td class="border px-4 py-2">{{ $item->keluhan }}</td>
                            <td class="border px-4 py-2">{{ $item->catatan_dokter }}</td>
                            <td class="border px-4 py-2">{{ $item->status }}</td>
                            <td class="border px-4 py-2 flex justify-center">
                                <form method="POST" action="{{ route('QRPage') }}">
                                    @csrf
                                    <input type="hidden" name="qr_code_result" id="result"
                                        value="{{ $item->qrcode }}">
                                    <button type="submit">

                                        <img src="{{ asset('qrcodes/' . $item->qrcode) }}" alt="QR Code"
                                            class="w-40 h-auto object-cover">

                                    </button>
                                </form>
                            </td>
                        </tr>
                    @elseif ($item->status == 'on process')
                        <tr class="m-2 bg-green-400">
                            <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                            <td class="border px-4 py-2">{{ $item->poli->name }}</td>
                            <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td class="border px-4 py-2">{{ $item->keluhan }}</td>
                            <td class="border px-4 py-2">{{ $item->catatan_dokter }}</td>
                            <td class="border px-4 py-2">{{ $item->status }}</td>
                            @php
                                $statusrating = App\Models\Rating::where('id_pengajuan', $item->id)->first();
                                // dd($item->id);
                            @endphp
                            @if ($statusrating == null)
                                <td class="border px-4 py-2">

                                    <a href="{{ route('inputRating', ['id' => $item->id]) }}"
                                        class="bg-white py-2 px-4 rounded-2xl">Berikan Penilaian Anda</a>



                                </td>
                            @else
                                <td class="border px-4 py-2">
                                    <div class="text-center p-2">
                                        Anda telah memberikan penilaian
                                    </div>

                                </td>
                            @endif

                        </tr>
                    @elseif ($item->status == 'done')
                        <tr class="m-2">
                            <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                            <td class="border px-4 py-2">{{ $item->poli->name }}</td>
                            <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td class="border px-4 py-2">{{ $item->keluhan }}</td>
                            <td class="border px-4 py-2">{{ $item->catatan_dokter }}</td>
                            <td class="border px-4 py-2">{{ $item->status }}</td>
                            {{-- @if ($suratIzin != null)
                                ini surat izin
                            @else --}}

                            @php
                                $namaPDF = App\Models\RekapMedis::where('surat_izin', $item->id . $item->nip . $item->tglpemeriksaan . '.pdf')->first();

                                // dd($namaPDF);

                            @endphp

                            @if ($namaPDF != null)
                            <td class="border px-4 py-2">
                                    <a href="{{ asset('pdf/' . $namaPDF->surat_izin) }}" download>
                                        <button class="bg-green-500 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-blue-600">
                                            Download Surat Izin
                                        </button>
                                    </a>
                                </td>
                            @else
                                <td class="border px-4 py-2">
                                    <div class="text-center p-2">
                                        Proses pemeriksaan kesehatan anda telah selesai.
                                    </div>

                                </td>
                            @endif

                            {{-- @endif --}}
                        </tr>
                    @else
                        <tr class="m-2 bg-blue-400 ">
                            <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                            <td class="border px-4 py-2">{{ $item->poli->name }}</td>
                            <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td class="border px-4 py-2">{{ $item->keluhan }}</td>
                            <td class="border px-4 py-2">{{ $item->catatan_dokter }}</td>
                            <td class="border px-4 py-2">{{ $item->status }}</td>
                            <td class="border px-4 py-2">Pengajuan telah dikirim, silahkan tunggu balasan dari dokter.
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>

        </table>
        {{-- <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2 text-left">Nama Pengajuan</th>
                    <th class="border px-4 py-2 text-left">Poli</th>
                    <th class="border px-4 py-2 text-left">Waktu Pengajuan</th>
                    <th class="border px-4 py-2 text-left">Keluhan</th>
                    <th class="border px-4 py-2 text-left">Catatan</th>
                    <th class="border px-4 py-2 text-left">Status</th>
                    <th class="border px-4 py-2 text-left">Keterangan</th>
                </tr>
            </thead>
            @php
                // Mendapatkan daftar pengajuan check up berdasarkan NIP pengguna saat ini
                $pengajuanCheckUps = App\Models\PengajuanCheckUp::where('nip', Auth::user()->nip)
                    ->orderBy('created_at', 'desc') // Urutkan berdasarkan waktu pengajuan dari yang terbaru
                    ->paginate(5);
            @endphp

            <tbody class="bg-gray-300">
                @foreach ($pengajuanCheckUps as $item)
                    <tr class="bg-red-500">
                        <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                        <td class="border px-4 py-2">{{ $item->poli->name }}</td>
                        <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                        <td class="border px-4 py-2">{{ $item->keluhan }}</td>
                        <td class="border px-4 py-2">{{ $item->catatan_dokter }}</td>
                        <td class="border px-4 py-2">{{ $item->status }}</td>
                        @if ($item->status == 'rejected')
                            <td class="border px-4 py-2 ">
                                <div class="bg-red-500 text-center p-2">
                                    Pengajuan anda telah Ditolak

                                </div>
                            </td>
                        @elseif ($item->status == 'approved')
                            <td class="border px-4 py-2 flex justify-center">
                                <form method="POST" action="{{ route('QRPage') }}">
                                    @csrf
                                    <input type="hidden" name="qr_code_result" id="result"
                                        value="{{ $item->qrcode }}">
                                    <button type="submit">

                                        <img src="{{ asset('qrcodes/' . $item->qrcode) }}" alt="QR Code"
                                            class="w-40 h-auto object-cover">

                                    </button>
                                </form>
                            </td>
                        @elseif ($item->status == 'done')
                            @if ($suratIzin != null)
                                {{-- ini surat izin --}}
        {{-- @else
                                Proses pemeriksaan kesehatan anda telah selesai.
                            @endif
                        @else
                        <td class="border px-4 py-2">Pengajuan telah dikirim, silahkan tunggu balasan dari dokter.</td>

                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>  --}}
    </div>
    <div class="mt-6">
        {{ $pengajuanCheckUps->links() }}
    </div>
    <div class="text-center mt-6">
        <button
            class="bg-green-500 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-green-600">
            <a href="/poliPage">Ajukan Pemeriksaan</a>
        </button>
    </div>
</div>
@include('sweetalert::alert')
