<x-app-layout>
    <div class="py-6 pt-[90px]">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3 lg:p-4 bg-white border-b border-gray-200">
                    <div class="p-3 lg:p-4 bg-white flex justify-between">
                        <h1 class="text-2xl font-medium text-gray-900">
                            Selamat Datang Dokter {{ Auth::user()->name }}
                        </h1>

                        <div class="flex items-center">
                            <form action="{{ route('searchHistory') }}" method="GET" class="flex">
                                <input type="text" name="query" placeholder="Search..."
                                    class="border border-gray-300 rounded-l-md py-2 px-4 focus:outline-none focus:ring focus:border-blue-300">
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-r-md focus:outline-none focus:ring focus:border-blue-300">Search</button>
                            </form>
                        </div>
                    </div>

                    <style>
                        .custom-table {
                            border-collapse: separate;
                            border-spacing: 0 0.5rem;
                        }
                    </style>

                    <div class="overflow-x-auto mt-6">
                        <table class="custom-table min-w-full divide-y divide-gray-200 text-center">
                            <thead class="bg-gray-300">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Pasien</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Divisi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Poli</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Keluhan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal Pengajuan Pemeriksaan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($pengajuan as $item)
                                    <tr class="{{ $item->getStatusClass() }}">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->username }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->divisi }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->poli }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->keluhan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->tglpemeriksaan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $pengajuan->links() }}
                        </div>
                        <form action="{{ route('print.history') }}" method="POST" target="_blank">
                            @csrf
                            <input type="hidden" name="pengajuan" value="{{ json_encode($pengajuan) }}">
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md focus:outline-none focus:ring focus:border-green-300">Print to PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</x-app-layout>
