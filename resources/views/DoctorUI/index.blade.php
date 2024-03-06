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
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama Pasien</th>
                            <th class="border px-4 py-2">Divisi</th>
                            <th class="border px-4 py-2">Keluhan</th>
                            <th class="border px-4 py-2">Tanggal Pengajuan Pemeriksaan</th>
                            <th class="border px-4 py-2 col-span-2">Action</th>
                        </thead>
                        <tbody>

                            @foreach ($Pengajuan as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    @php
                                        $user = App\Models\User::where('nip', $item->nip)->first();
                                    @endphp
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->divisi }}</td>
                                    <td class="border px-4 py-2">{{ $item->keluhan }}</td>
                                    <td class="border px-4 py-2">{{ $item->tglpengajuan }} </td>
                                    <td class="border px-4 py-2 flex">
                                        <button
                                        class="bg-red-500 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-red-600">

                                            <a href="{{ route('RecectionPage', $item->id) }}">Tolak Pengajuan</a>
                                        </button>
                                        <button
                                        class="bg-green-500 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-green-600">
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
