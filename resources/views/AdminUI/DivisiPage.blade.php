<x-app-layout>
    <div class="py-12">
        <div class="min-h-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-400 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-10 lg:p-10 bg-gray-200 border-b border-gray-200 justify-center ">
                    <div class="bg-white border-b border-gray-200 sm:rounded-lg ">
                        <div class="flex p-5 my-auto gap-10 justify-between">
                            <div class="text-2xl font-medium text-gray-900">
                                Selamat Datang Admin {{ Auth::user()->name }}
                            </div>

                            <div class="flex items-center">
                                <form action="{{ route('searchDivisi') }}" method="GET" class="flex">
                                    <input type="text" name="query" placeholder="Search..." class="border border-gray-300 rounded-l-md py-2 px-4 focus:outline-none focus:ring focus:border-blue-300">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md focus:outline-none focus:ring focus:border-blue-300">Search</button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <style>
                        .custom-table {
                            border-collapse: separate;
                            border-spacing: 0 0.5rem;
                            /* Menentukan jarak vertikal antara baris (0.5 rem disini, bisa disesuaikan) */
                        }
                    </style>

                    <table class="custom-table w-full text-center mt-2 mb-2 ">
                        <thead class="bg-gray-300 mb-[10px]">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Divisi</th>
                            <th class="px-4 py-2">Action</th>
                        </thead>

                        <tbody>
                            @foreach ($divisi as $key => $item)
                                <tr>
                                    <td class="bg-white py-2 px-4">{{ $key + 1 }}</td>
                                    <td class="bg-white py-2 px-4">{{ $item->name }}</td>
                                    <td class="bg-white py-2 px-4">
                                        <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                                Click Me
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <div name="box" class="bg-gray-400 ">
                                                <a href="{{ route('UpdateDivisiPage', $item->id) }}" class="text-left w-48 block px-4 py-2 text-sm text-white hover:bg-gray-600">Update Divisi</a>

                                            <form method="POST" action="{{ route('DeleteDivisi', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-left w-48 block px-4 py-2 text-sm text-white hover:bg-gray-600">Delete Divisi</button>
                                            </form>
                                            </div>
                                        </x-slot>
                                    </x-dropdown>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('CreateDivisiPage') }}"><button class="bg-blue-400 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-blue-600">Create User</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</x-app-layout>
