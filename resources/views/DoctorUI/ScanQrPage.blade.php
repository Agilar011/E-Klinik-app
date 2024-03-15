<!-- resources/views/ambil-foto.blade.php -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Ambil Foto
                    </h1>
                    <div>
                        <video id="video" width="100%" height="auto" autoplay></video>
                        <button id="capture-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Ambil dan Simpan Foto</button>
                    </div>
                    <form id="form-foto" method="POST" action="{{ route('scanQr') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="foto" id="foto">
                    </form>
                    <canvas id="canvas" style="display:none;"></canvas>
                </div>
                </div>
            </div>
        </div>
</x-app-layout>

<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureBtn = document.getElementById('capture-btn');
    const formFoto = document.getElementById('form-foto');

    // Mendapatkan akses ke kamera pengguna
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            video.srcObject = stream;
            video.play();
        })
        .catch(function(err) {
            console.error('Gagal mendapatkan akses ke kamera', err);
        });

    // Mengambil foto dari video stream dan menyimpannya di canvas
    captureBtn.addEventListener('click', function() {
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Mengambil gambar dari canvas sebagai data URL
        const foto = canvas.toDataURL('image/png');

        // Menyimpan foto ke input hidden
        document.getElementById('foto').value = foto;

        // Mengirimkan form secara otomatis setelah foto diambil
        formFoto.submit();
    });
</script>
