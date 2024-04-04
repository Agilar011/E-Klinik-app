<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="width: 19cm; font-family: sans-serif;">
    <table id="lembarIzin" style="font-family: sans-serif; background-color: #ffffff; overflow: hidden; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border-radius: 0.5rem; padding: 2.5rem; width: 100%;">
        <tr>
            <td colspan="4" style="text-align: center;">
                {{-- <img id="logo" src="/img/pal-logo.png" alt="Logo Klinik"> --}}
                <div id="div-foto" style="text-align: left; margin-top: 20px;">
                    <img id="foto" src="/img/pal-logo.png" alt="" style="height: 40px; width: auto;">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                No: {{ $request->noSurat }}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center; margin-top: 20px; text-decoration: underline;">
                SURAT KETERANGAN DOKTER
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: justify;">
                Yang bertanda tangan di bawah ini, Dokter Puskesmas Pekayon, menerangkan bahwa:
            </td>
        </tr>
        <tr>
            <td class="bold" style="font-weight: bold;">Nama:</td>
            <td class="non-bold" style="font-weight: normal;">{{ $request->name }}</td>
            <td class="bold" style="font-weight: bold;">Umur:</td>
            <td class="non-bold" style="font-weight: normal;">{{ $request->umur }}</td>
        </tr>
        <tr>
            <td class="bold" style="font-weight: bold;">Pangkat:</td>
            <td class="non-bold" style="font-weight: normal;">{{ $request->pangkat }}</td>
            <td class="bold" style="font-weight: bold;">NIP:</td>
            <td class="non-bold" style="font-weight: normal;">{{ $request->NIPPasien }}</td>
        </tr>
        <tr>
            <td class="bold" style="font-weight: bold;">Bagian:</td>
            <td class="non-bold" style="font-weight: normal;">{{ $request->divisi }}</td>
            <td class="bold" style="font-weight: bold;">Cost Centre:</td>
            <td class="non-bold" style="font-weight: normal;">{{ $request->cost }}</td>
        </tr>
        <tr>
            <td class="bold" style="font-weight: bold;">Perlu mendapatkan istirahat/Dinas ringan selama:</td>
            <td class="non-bold" style="font-weight: normal;">{{ $request->jumlahHariIzin }}</td>
            <td colspan="2" class="bold" style="font-weight: bold;"> hari terhitung mulai</td>
        </tr>
        <tr>
            <td class="bold" style="font-weight: bold;">Tanggal:</td>
            <td class="non-bold" style="font-weight: normal;">{{ $tglmulai }}</td>
            <td class="bold" style="font-weight: bold;">s/d</td>
            <td class="non-bold" style="font-weight: normal;">{{ $tglakhir }}</td>
        </tr>
        <tr>
            <td class="bold" style="font-weight: bold;">Keterangan Lain-lain: </td>
            <td colspan="3" class="non-bold" style="font-weight: normal;">{{ $request->keterangan }}</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right; padding-right: 20px;">
                <div id="dataDokter" class="text-center" style="text-align: center;">
                    <p>Tanggal : {{ $request->tglpemeriksaan }}</p>
                    <p>Dokter yang memeriksa</p>
                    <div class="text-center" style="text-align: center;">
                        <img id="ttd" src="/images/1 00000000 2022-11-15.png" alt="TTD" style="height: 100px; width: auto; align-items: center;">
                    </div>
                    <p>Dr {{ auth()->user()->name }}</p>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
