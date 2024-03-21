<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome, {{ Auth::user()->name }}
    </h1>

    <div class="overflow-x-auto mt-6">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2 text-left">Nama Pengajuan</th>
                    <th class="border px-4 py-2 text-left">Poli</th>
                    <th class="border px-4 py-2 text-left">Waktu Pengajuan</th>
                    <th class="border px-4 py-2 text-left">Keluhan</th>
                    <th class="border px-4 py-2 text-left">Catatan</th>
                    <th class="border px-4 py-2 text-left">Status</th>
                    <th class="border px-4 py-2 text-left">QR Code</th>
                </tr>
            </thead>
            @php
                // Mendapatkan daftar pengajuan check up berdasarkan NIP pengguna saat ini
                $pengajuanCheckUps = App\Models\PengajuanCheckUp::where('nip', Auth::user()->nip)
                    ->orderBy('created_at', 'desc') // Urutkan berdasarkan waktu pengajuan dari yang terbaru
                    ->paginate(5);
            @endphp

            <tbody>
                @foreach ($pengajuanCheckUps as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                        <td class="border px-4 py-2">{{ $item->poli->name }}</td>
                        <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                        <td class="border px-4 py-2">{{ $item->keluhan }}</td>
                        <td class="border px-4 py-2">{{ $item->catatan_dokter }}</td>
                        <td class="border px-4 py-2">{{ $item->status }}</td>
                        <td class="border px-4 py-2">
                            @if ($item->qrcode != null)
                                <form method="POST" action="{{ route('QRPage') }}">
                                    @csrf
                                    <input type="hidden" name="qr_code_result" id="result"
                                        value="{{ $item->qrcode }}">
                                    <button type="submit">

                                        <img src="{{ asset('qrcodes/' . $item->qrcode) }}" alt="QR Code"
                                            class="w-40 h-auto object-cover">

                                    </button>
                                </form>

                                {{--
                            <a href="{{ route('QRPage', ['QR' => $item->qrcode]) }}">
                            </a> --}}
                            @else
                                <p>QR Code belum tersedia</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
