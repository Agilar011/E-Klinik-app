<x-app-layout>
    <div class="py-12 pt-[90px]">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3 lg:p-4 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-medium text-gray-900">
                        Lengkapi Data Pemeriksaan
                    </h1>

                    @php
                        $datapoli = App\Models\Poli::where('id', $pengajuan->idpoli)->first();
                        $datauser = App\Models\User::where('nip', $pengajuan->nip)->first();
                        $idpengajuan = $pengajuan->id;
                        // dd($idpengajuan);
                    @endphp


                    {{-- <form action="{{ route('setujuipengajuan', $pengajuan->id) }}" method="POST"> --}}
                    <form action="{{ route('suratizin', $idpengajuan) }}" method="POST">
                        @csrf
                        @method('GET')
                        {{-- @php
                        dd($idpengajuan);

                        @endphp --}}

                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">Poli yang dituju:</label>
                                <input type="text" name="idpoli" id="idpoli" value="{{ $datapoli->name }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="name" class="font-medium text-gray-700">Name:</label>
                                <input type="text" name="name" id="name" value="{{ $datauser->name }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="divisi" class="font-medium text-gray-700">Divisi:</label>
                                <input type="text" name="divisi" id="divisi" value="{{ $datauser->divisi }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Tanggal Lahir" class="font-medium text-gray-700">Tanggal Lahir:</label>
                                <input type="date" name="Tanggal Lahir" id="Tanggal Lahir"
                                    value="{{ $datauser->tanggal_lahir }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Tinggi Badan" class="font-medium text-gray-700">Tinggi Badan:</label>
                                <input type="text" name="Tinggi Badan" id="Tinggi Badan"
                                    value="{{ $datauser->tinggi_badan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Berat Badan" class="font-medium text-gray-700">Berat Badan:</label>
                                <input type="text" name="Berat Badan" id="Berat Badan"
                                    value="{{ $datauser->berat_badan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="Keluhan" class="font-medium text-gray-700">Keluhan:</label>
                                <input type="text" name="keluhan" id="keluhan" value="{{ $pengajuan->keluhan }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                                    readonly>
                            </div>

                            <div class="flex flex-col space-y-3">
                                <x-label for="suratizin" :value="__('Pilih Surat Izin: ')" />
                                <select name="suratizin" id="suratizin"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                                    <option value="tanpasuratizin">Tanpa Surat Izin</option>
                                    <option value="dengansuratizin">Dengan Surat Izin</option>
                                </select>
                            </div>

                            <div id="suratIzinInput" class="flex flex-col space-y-3">
                                <x-label for="jumlahhari" :value="__('Jumlah hari: ')" />
                                <input type="number" name="jumlahhari" id="jumlahhari" value=""
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500">
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const doctorPoliSelect = document.getElementById('suratizin');
                                const suratIzinInput = document.getElementById('suratIzinInput');

                                function togglePoliInputVisibility() {
                                    // Jika nilai surat izin adalah 'dengansuratizin', tampilkan input form jumlah hari
                                    if (doctorPoliSelect.value.toLowerCase() === 'dengansuratizin') {
                                        suratIzinInput.style.display = 'block'; // Tampilkan input form jumlah hari
                                        suratIzinInput.querySelector('input').setAttribute('required', true); // Tambahkan atribut required pada input form jumlah hari
                                    } else {
                                        suratIzinInput.style.display = 'none'; // Sembunyikan input form jumlah hari
                                        suratIzinInput.querySelector('input').removeAttribute('required'); // Hapus atribut required dari input form jumlah hari
                                    }
                                }

                                // Panggil fungsi togglePoliInputVisibility saat halaman dimuat atau nilai surat izin diubah
                                togglePoliInputVisibility();
                                doctorPoliSelect.addEventListener('change', togglePoliInputVisibility);
                            });
                        </script>


                        <div class="flex justify-between mt-4">
                            <button type="button" onclick="window.history.back()"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                Back
                            </button>
                            <button type="submit"
                                class="bg-green-500 text-white px-8 py-2 text-center text-base font-semibold rounded-lg shadow-md hover:bg-green-600">
                                Lanjutkan Proses
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>