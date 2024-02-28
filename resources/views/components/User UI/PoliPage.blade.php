<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome, {{ Auth::user()->name }}
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        @php
                // Mendapatkan daftar pengajuan check up berdasarkan NIP pengguna saat ini
                $pengajuanCheckUps = App\Models\PengajuanCheckUp::where('nip', Auth::user()->nip)->get();
                $counter = 0;
            @endphp
            <table>
                <thead>
                    <th>No</th>
                    <th>Nama Pengajuan</th>
                    <th>Poli</th>
                    <th>Keluhan</th>
                </thead>

            <tbody>
                @foreach ($pengajuanCheckUps as $item)
                @php
                    $counter++;
                @endphp
                <tr>
                    <td> {{$counter }} </td>
                <td>{{ Auth::user()->name }}</td>
                <td>{{ $item->poli->name }}</td>
                <td>{{$item->keluhan}}</td>


                </tr>


        @endforeach

            </tbody>
        </table>
    </p>
    <div class="text-center">
        <button style="background-color: #4CAF50; /* Green */
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                    border-radius: 10px;">
          <a href="">Ajukan Pemeriksaan</a>
        </button>
      </div>
</div>

