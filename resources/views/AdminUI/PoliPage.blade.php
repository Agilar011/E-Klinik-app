<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200" style="margin-bottom: 100px;">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        @include('sweetalert::alert')

                        {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Selamat Datang Admin {{ Auth::user()->name }}
                        </h1>
                        <h3>
                            Silahkan beri tindakan pada Poli.
                        </h3>
                    </div>
                    <table>
                        <thead>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama Dokter</th>
                            <th class="border px-4 py-2">Nama Poli</th>
                            <th class="border px-4 py-2">Action</th>
                        </thead>

                        <tbody>
                            @foreach ($dataPolis as $key => $item)
                                {{-- @php
                                    $user = App\Models\User::where('id', $item->id_dokter);
                                    $poli = App\Models\Poli::where('id', $item->id_poli);
                                @endphp --}}
                                <tr>
                                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $item->user_name }}</td>
                                    <td class="border px-4 py-2">{{ $item->poli_name }}</td>
                                    <td class="border px-4 py-2">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button
                                                    class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded">
                                                    Click Me
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                {{-- <a href="Create User" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Create New User</a> --}}
                                                <a href="{{ route('UpdatePoliPage', $item->id) }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update
                                                    Poli</a>

                                                    <form method="POST" action="{{ route('DeletePoli', $item->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" >Delete Poli</button> --}}
                                                    <button type="submit"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                        data-confirm-delete="true"
                                                        onclick="return confirm('are You Sure')">Delete Poli</button>
                                                </form>

                                                {{-- <pre>{{ route('DeletePoli', $item->id) }}</pre> --}}
                                            </x-slot>
                                        </x-dropdown>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($doctorWithoutPoli->count() > 0)
                    <table>
                        <thead>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama Poli</th>
                        </thead>
                        <tbody>
                            @foreach ($doctorWithoutPoli as $key => $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $item->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @else

                    @endif

                    @if ($polisWithoutDoctor->count() > 0)

                    @else

                    @endif
                    {{-- <table>
                        <thead>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama Poli</th>
                        </thead>
                        <tbody>
                            @foreach ($polisWithoutDoctor as $key => $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $item->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}

                    <a href="{{ route('CreatePoliPage') }}"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">Create
                    Poli</a>
                </div>
            </div>
        </div>
    </div>







</x-app-layout>
