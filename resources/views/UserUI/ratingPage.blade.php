<x-app-layout>
    <div class="py-6 pt-[75px]">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="pt-10 pb-4 px-8 bg-white border-b border-gray-200">
                    {{-- <x-application-logo class="block h-12 w-auto" /> --}}

                    <h1 class=" text-2xl font-medium text-gray-900">
                        Masukkan Rating Layanan Kesehatan
                    </h1>


                    <form action="{{ route('ratingProcessing', $pengajuan->id) }}" method="POST">

                        @csrf
                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">Poli yang dituju:</label>
                                <input type="text" name="idpoli" id="idpoli" value="{{$namaPoli}}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500" readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="name" class="font-medium text-gray-700">Nama Dokter:</label>
                                <input type="text" name="name" id="name" value="Dr {{ $namaDokter }}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500" readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="idpoli" class="font-medium text-gray-700">Keluhan:</label>
                                <input type="text" name="idpoli" id="idpoli" value="{{$pengajuan->keluhan}}"
                                    class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500" readonly>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="rating" class="font-medium text-gray-700">Rating :</label>
                                <input type="hidden" name="rating" id="rating" value="0">
                                <div class="flex items-center">
                                    <button type="button"
                                        class="rating-star text-3xl text-gray-500 hover:text-yellow-500 focus:outline-none transition-colors"
                                        data-value="1">&#9733;</button>
                                    <button type="button"
                                        class="rating-star text-3xl text-gray-500 hover:text-yellow-500 focus:outline-none transition-colors"
                                        data-value="2">&#9733;</button>
                                    <button type="button"
                                        class="rating-star text-3xl text-gray-500 hover:text-yellow-500 focus:outline-none transition-colors"
                                        data-value="3">&#9733;</button>
                                    <button type="button"
                                        class="rating-star text-3xl text-gray-500 hover:text-yellow-500 focus:outline-none transition-colors"
                                        data-value="4">&#9733;</button>
                                    <button type="button"
                                        class="rating-star text-3xl text-gray-500 hover:text-yellow-500 focus:outline-none transition-colors"
                                        data-value="5">&#9733;</button>
                                </div>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="komentar" class="font-medium text-gray-700">Komentar, Masukan, dan Saran:</label>
                                <textarea name="komentar" id="komentar" rows="4" class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"></textarea>
                            </div>




                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const ratingStars = document.querySelectorAll(".rating-star");

                                    ratingStars.forEach(star => {
                                        star.addEventListener("click", function() {
                                            const value = parseInt(this.getAttribute("data-value"));
                                            document.getElementById("rating").value = value;

                                            // Menghapus kelas 'active' dari semua bintang
                                            ratingStars.forEach(star => star.classList.remove("text-yellow-500"));

                                            // Menambahkan kelas 'active' pada bintang yang dipilih
                                            for (let i = 0; i < value; i++) {
                                                ratingStars[i].classList.add("text-yellow-500");
                                            }
                                        });
                                    });
                                });
                            </script>



                        </div>
                        <button type="button" onclick="window.history.back()"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            Back
                        </button>
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Kirim Pengajuan Pemeriksaan </button>
                </div>

            </div>
        </div>





</x-app-layout>
