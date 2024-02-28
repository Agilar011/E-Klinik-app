<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome, {{ Auth::user()->name }}
    </h1>

    <p class="mt-10 text-gray-500 leading-relaxed">
        @php
                // Mendapatkan daftar pengajuan check up berdasarkan NIP pengguna saat ini
                $pengajuanCheckUps = App\Models\PengajuanCheckUp::where('nip', Auth::user()->nip)->get();
                $counter = 0;
            @endphp
        <table class="table-auto w-full">
            <thead>
                <th class="border px-4 py-2 text-left">No</th>
                <th class="border px-4 py-2 text-left">Nama Pengajuan</th>
                <th class="border px-4 py-2 text-left">Poli</th>
                <th class="border px-4 py-2 text-left">Keluhan</th>
                </thead>

            <tbody>
                @foreach ($pengajuanCheckUps as $item)
                @php
                    $counter++;
                @endphp
                <tr>
                <td class="border px-4 py-2"> {{$counter }} </td>
                <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                <td class="border px-4 py-2">{{ $item->poli->name }}</td>
                <td class="border px-4 py-2">{{$item->keluhan}}</td>


                </tr>


        @endforeach

            </tbody>
        </table>
    </p>
    <div class="text-center">
        <button class="bg-green-500 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-green-600">
            <a href="/poliPage">Ajukan Pemeriksaan</a>
        </button>
      </div>
</div>

