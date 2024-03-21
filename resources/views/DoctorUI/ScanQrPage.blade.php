<x-app-layout>
    <div class="py-12">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div id="reader" style="width: 600px" class="mb-4"></div>
                    <form method="POST" action="{{ route('ScanQrResult') }}">
                        @csrf
                        <label for="">Kode QR: <br></label>
                        <input type="text" name="qr_code_result" id="result" class="w-1/2">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

</x-app-layout>


<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script>
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        // console.log(`Code matched = ${decodedText}`, decodedResult);
        document.getElementById("result").value = decodedText;
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: { width: 250, height: 250 } },
        /* verbose= */ false
    );
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
