<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: linear-gradient(rgba(252, 252, 252, 0.6), rgba(119, 191, 249, 0.6)), url(img/KapalRS3.jpg); background-size: 100%;">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 border border-black shadow-md overflow-hidden sm:rounded-lg" style="background-image: linear-gradient(rgba(252, 252, 252, 0.6), rgba(252, 252, 252, 0.6));">
        {{ $slot }}
    </div>
</div>
