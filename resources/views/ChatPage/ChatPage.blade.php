<x-app-layout>
    <div class="py-12 pt-[90px]">
        <div class="min-w-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3 lg:p-4 bg-white border-b border-gray-200" style="min-height: 80vh;">
                    <h1 class="text-2xl font-medium text-gray-900">
                        Lengkapi Data Persetujuan Yang Diperlukan
                    </h1>

                    @php
                        $chatrooms = App\Models\ChatRoom::where('user_id_sender', auth()->user()->id)->get();
                    @endphp

                    <div class="flex justify-center items-center">
                        <div class="flex w-full h-80 border border-gray-300 rounded-lg overflow-hidden">
                            <!-- Bagian kiri dengan daftar nama pengirim -->
                            <ul class="sender w-1/4 border-r border-gray-300 overflow-y-auto">
                                @foreach ($chatrooms as $item)
                                    @php
                                        $user = App\Models\User::find($item->user_id_receiver);
                                    @endphp
                                    {{-- Ini List Sender --}}
                                    <li class="p-4 border-b border-gray-300 cursor-pointer" data-sender="{{ $user->id }}" chatroom="{{ $item->id }}">{{ $user->name }}</li>
                                @endforeach
                            </ul>

                            <!-- Bagian kanan dengan riwayat chat -->
                            <div class="w-3/4 p-4 overflow-y-auto">
                                <ul id="message-history">
                                    {{-- Riwayat chat akan diupdate secara real-time melalui Pusher --}}
                                </ul>

                                <!-- Form input pesan -->
                                <form id="message-form">
                                    <input type="text" id="message-input" placeholder="Ketik pesan Anda...">
                                    <button type="submit">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Inisialisasi Pusher
        var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
            encrypted: true
        });

        // Berlangganan ke channel 'my-channel'
        var channel = pusher.subscribe('my-channel');

        // Menangani event 'my-event'
        channel.bind('my-event', function(data) {
            // Tangani data yang diterima dari Pusher di sini
            console.log('Data dari Pusher:', data);
            // Tambahkan kode di sini untuk menampilkan pesan yang diterima ke riwayat chat
            var messageHistory = document.getElementById('message-history');
            var messageItem = document.createElement('li');
            messageItem.textContent = data.message; // Anda perlu menyesuaikan ini dengan struktur data yang dikirimkan
            messageHistory.appendChild(messageItem);
        });

        // Fungsi untuk memfilter dan menampilkan riwayat chat berdasarkan sender yang dipilih
        function showChatHistory(senderId, chatroomId) {
            // Dapatkan semua pesan dalam riwayat chat
            var messages = document.querySelectorAll('#message-history li');

            // Sembunyikan semua pesan
            messages.forEach(function(message) {
                message.style.display = 'none';
            });

            // Tampilkan pesan yang sesuai dengan sender yang dipilih
            var selectedMessages = document.querySelectorAll('#message-history li[data-sender="' + senderId + '"]');
            selectedMessages.forEach(function(message) {
                message.style.display = 'block';
            });
        }

        // Tambahkan event listener untuk form pengiriman pesan
        document.getElementById('message-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Menghindari pengiriman form standar
            var messageInput = document.getElementById('message-input').value;
            // Kirim pesan ke server (Anda perlu menyesuaikan ini dengan endpoint yang benar)
            // Misalnya, menggunakan Ajax atau fetch untuk mengirim pesan ke backend
            // Setelah itu, Anda dapat menambahkan logika untuk menambahkan pesan ke riwayat chat secara langsung atau menunggu respons dari server
        });

        // Tambahkan event listener ke elemen container untuk delegasi event
        document.querySelector('.sender').addEventListener('click', function(event) {
            var target = event.target;
            // Periksa apakah yang diklik adalah elemen sender
            if (target.classList.contains('border-b') && target.classList.contains('cursor-pointer')) {
                // Dapatkan sender id dan chatroom id
                var senderId = target.getAttribute('data-sender');
                var chatroomId = target.getAttribute('chatroom');

                console.log(chatroomId); // Ini akan mencetak chatroomId ke konsol browser
                console.log(senderId); // Ini akan mencetak senderId ke konsol browser

                // Tampilkan riwayat chat untuk sender yang dipilih
                showChatHistory(senderId, chatroomId);
            }
        });
    </script>
</x-app-layout>
