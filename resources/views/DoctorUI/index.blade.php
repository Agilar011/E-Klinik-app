<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Selamat Datang Dokter {{ Auth::user()->name }}
                        </h1>
                        <h3>
                            Silahkan beri tindakan pada pengajuan yang ada.
                        </h3>

                        {{-- <p class="mt-6 text-gray-500 leading-relaxed">
                            Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                            to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                            you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                            ecosystem to be a breath of fresh air. We hope you love it.
                        </p> --}}
                    </div>
                    <table>
                        <thead>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Divisi</th>
                            <th>Keluhan</th>
                            <th>Tanggal Pengajuan Pemeriksaan</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($Pengajuan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @php
                                        $user = App\Models\User::where('nip', $item->nip)->first();
                                    @endphp
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->divisi }}</td>
                                    <td>{{ $item->keluhan }}</td>
                                    <td>{{ $item->tglpengajuan }} </td>
                                    <td><button
                                            style="background-color: #af4c4c;
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

                                            <a href="{{ route('RecectionPage', $item->id) }}">Tolak Pengajuan</a>
                                        </button></td>
                                    <td><button
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
                                        border-radius: 10px;">
                                            <a href="{{ route('AcceptionPage', $item->id) }}">Setujui Pengajuan</a>
                                        </button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>





</x-app-layout>
