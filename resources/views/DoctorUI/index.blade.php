<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Selamat Datang Dokter {{ Auth::user()->name }}
                        </h1>
                        <h3>
                            Silahkan beri tindakan pada pengajuan yang ada.
                        </h3>
                    </div>

                    <style>
                        .custom-table {
                            border-collapse: separate;
                            border-spacing: 0 0.5rem;
                            /* Menentukan jarak vertikal antara baris (0.5 rem disini, bisa disesuaikan) */
                        }
                    </style>

                    <div class="overflow-x-auto mt-6">
                        <table class="custom-table min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pasien</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Divisi</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Keluhan</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pengajuan Pemeriksaan</th>
                                    <th scope="col" class="px-6 py-3 text-center
                                     text-xs font-medium text-gray-500 uppercase tracking-wider" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($Pengajuan as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                        @php
                                            $user = App\Models\User::where('nip', $item->nip)->first();
                                        @endphp
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->divisi }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->keluhan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->tglpengajuan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('RecectionPage', $item->id) }}" class="bg-red-500 text-white px-4 py-2 text-center text-sm font-semibold rounded-lg shadow-md hover:bg-red-600">Tolak Pengajuan</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('AcceptionPage', $item->id) }}" class="bg-green-500 text-white px-4 py-2 text-center text-sm font-semibold rounded-lg shadow-md hover:bg-green-600">Setujui Pengajuan</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
