<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200" style="margin-bottom: 100px;">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Selamat Datang Admin {{ Auth::user()->name }}
                        </h1>
                        <h3>
                            Silahkan beri tindakan pada user.
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
                            <th class="border px-4 py-2">NIP</th>
                            <th class="border px-4 py-2">Nama Pasien</th>
                            <th class="border px-4 py-2">Divisi</th>
                            <th class="border px-4 py-2">Tanggal Lahir</th>
                            <th class="border px-4 py-2">Role</th>
                            <th class="border px-4 py-2">Action</th>
                        </thead>

                        <tbody>
                            @foreach ($user as $key => $item)
                            @php
                                $id = App\Models\User::where('id', $item->id)->first();
                            @endphp
                                <tr>
                                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $item->nip }} </td>
                                    <td class="border px-4 py-2">{{ $item->name }}</td>
                                    <td class="border px-4 py-2">{{ $item->divisi }}</td>
                                    <td class="border px-4 py-2">{{ $item->tanggal_lahir }}</td>
                                    <td class="border px-4 py-2">{{ $item->role }} </td>
                                    <td class="border px-4 py-2">
                                        <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded">
                                                Click Me
                                            </button>
                                        </x-slot>
                                        DeleteUser

                                        <x-slot name="content">
                                            <div name="box" class="bg-blue-200 ">
                                                <a href="{{ route('UpdateUserPage', $id) }}" class="text-left w-48 block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update User</a>

                                            <form method="POST" action="{{ route('SetDefaultUser', $id) }}">
                                                @csrf
                                                <button type="submit" class="text-left w-48 block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Set Default</button>
                                            </form>

                                            <form method="POST" action="{{ route('DeleteUser', $id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-left w-48 block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete Account</button>
                                            </form>
                                            </div>
                                            {{-- <a href="Create User" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Create New User</a> --}}
                                            {{-- <a href="{{ route('UpdateUserPage', $id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update User</a>

                                            <form method="POST" action="{{ route('SetDefaultUser', $id) }}">
                                                @csrf
                                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Set Default</button>
                                            </form>

                                            <form method="POST" action="{{ route('DeleteUser', $id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete Account</button>
                                            </form> --}}

                                            {{-- <a href="{{ route('SetDefaultUser', $id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Set Default</a> --}}
                                        </x-slot>
                                    </x-dropdown>

                                    </td>
                                    {{-- <td><button
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
                                        </button></td> --}}
                                    {{-- <td><button
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
                                        </button></td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>





</x-app-layout>
