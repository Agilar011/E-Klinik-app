<x-app-layout>
    <div class="py-12 pt-[80px]">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5 lg:p-5 bg-gray-200 border-b border-gray-200 justify-center ">
                    <div class="bg-white border-b border-gray-200 sm:rounded-lg">
                        <div class="flex p-5 my-auto gap-10 justify-between">
                            <div class="text-2xl font-medium text-gray-900">
                                Selamat Datang Admin {{ Auth::user()->name }}
                            </div>

                            <div class="flex items-center">
                                <form action="{{ route('searchUser') }}" method="GET" class="flex">
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

                    <table class="custom-table w-full text-center m-2">
                        <thead class="bg-gray-300 mb-[10px]">
                            <th class="py-2">NIP</th>
                            <th class="py-2">Nama Pasien</th>
                            <th class="py-2">Divisi</th>
                            <th class="py-2">Tanggal Lahir</th>
                            <th class="py-2">Role</th>
                            <th class="py-2">Action</th>
                        </thead>

                        <tbody>

                            @foreach ($user as $key => $item)
                                @php
                                    $id = App\Models\User::where('id', $item->id)->first();
                                @endphp
                                <tr class="m-2">
                                    <td class="bg-white py-2 px-4">{{ $item->nip }} </td>
                                    <td class="bg-white py-2 px-4">{{ $item->name }}</td>
                                    <td class="bg-white py-2 px-4">{{ $item->divisi }}</td>
                                    <td class="bg-white py-2 px-4">{{ $item->tanggal_lahir }}</td>
                                    <td class="bg-white py-2 px-4">{{ $item->role }} </td>
                                    <td class="bg-white py-2 px-4">
                                        <x-dropdown align="right" width="w-auto">
                                            <x-slot name="trigger">
                                                <button
                                                    class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                                    Click Me
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <div name="box" class="bg-gray-400 ">
                                                    <a href="{{ route('UpdateUserPage', $id) }}"
                                                        class="text-left w-48 block px-4 py-2 text-sm text-white hover:bg-gray-600">Update
                                                        User</a>

                                                    <form method="POST" action="{{ route('SetDefaultUser', $id) }}">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-left w-48 block px-4 py-2 text-sm text-white hover:bg-gray-600">Reset
                                                            Password</button>
                                                    </form>

                                                    <form method="POST" action="{{ route('DeleteUser', $id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick=""
                                                            class="text-left w-48 block px-4 py-2 text-sm text-white hover:bg-gray-600">Delete
                                                            Account</button>
                                                    </form>
                                                </div>
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="">
                        {{ $user->links() }}
                    </div>

                    <a href="{{ route('CreateUserPage') }}"><button
                            class="bg-blue-400 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-blue-600">Create
                            User</button>
                    </a>






                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
</x-app-layout>
