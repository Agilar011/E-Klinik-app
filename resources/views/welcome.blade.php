<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style>
    </head>
    <body class="antialiased bg-blue-400">

        <nav class="bg-blue-400 shadow-md sticky top-0 z-50">
            <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-14 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            {{-- <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-12 w-auto bg-gray-100">
                                <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9192 7.84477C25.9317 7.92953 25.9441 8.01678 25.9441 8.10652L25.9441 37.7566L48.7566 25.0984L61.557 14.0311C61.6477 13.9664 61.7245 13.8757 61.7781 13.7679C61.8318 13.6602 61.8617 13.5385 61.8644 13.4157C61.869 13.2757 61.853 13.1369 61.8166 12.9995C61.7783 12.8603 61.7182 12.7252 61.6392 12.6029C61.6055 12.5454 61.5656 12.491 61.5225 12.44C61.4889 12.4015 61.4468 12.3683 61.4058 12.3344C61.3795 12.3111 61.3522 12.286 61.3249 12.2656C61.265 12.2184 61.2081 12.1781 61.1448 12.1457C61.0924 12.1186 61.0365 12.0962 60.9787 12.0802C60.9367 12.0677 60.8965 12.0531 60.8548 12.0433C60.8201 12.0348 60.7835 12.0315 60.7485 12.0315C60.6109 12.0315 60.4775 12.0898 60.3651 12.1941C60.3159 12.2383 60.271 12.2896 60.2306 12.345C60.2057 12.3787 60.1808 12.4123 60.1603 12.4492C60.1416 12.4791 60.1269 12.5108 60.1144 12.5428C60.0979 12.5899 60.0865 12.638 60.0865 12.6879C60.0865 12.7731 60.1097 12.8579 60.1554 12.9383C60.1954 13.0105 60.2509 13.0761 60.3151 13.1359L48.0123 26.2832L25.3055 38.9567L25.3055 62.1873L24.8032 62.6296C24.6672 62.7876 24.4443 62.8674 24.2356 62.8371C24.1692 62.8297 24.1041 62.8143 24.0424 62.7923C24.0237 62.7856 24.0063 62.775 23.9895 62.7659C23.9429 62.7393 23.8993 62.707 23.8589 62.6705C23.832 62.6471 23.8034 62.6205 23.7804 62.5926C23.7517 62.5602 23.7316 62.5256 23.7086 62.4932C23.6825 62.4559 23.6603 62.4174 23.6441 62.3765C23.6279 62.3357 23.6178 62.2926 23.6119 62.249C23.6089 62.2272 23.6089 62.2053 23.6119 62.1836C23.6149 62.1619 23.6218 62.141 23.6305 62.1208C23.6607 62.0554 23.7062 61.9941 23.7641 61.9395L49.1274 36.1579L61.3887 29.4265C61.4664 29.3762 61.5278 29.3014 61.5622 29.2106C61.5965 29.1199 61.6014 29.0183 61.5764 28.9229C61.5514 28.8275 61.4976 28.7429 61.4211 28.6805C61.3447 28.6182 61.2492 28.5819 61.1467 28.5763C61.0441 28.5708 60.9442 28.5968 60.8565 28.6499C60.829 28.6655 60.8039 28.6846 60.7808 28.705C60.7493 28.7299 60.7192 28.7563 60.6913 28.7861C60.6375 28.8482 60.5921 28.9215 60.5582 29.0012L49.1495 35.8555L61.8548 14.6253ZM45.3069 36.7607C45.3794 36.7523 45.4519 36.7574 45.5228 36.7756C45.5937 36.7938 45.6624 36.8248 45.7254 36.8677C45.7884 36.9106 45.8441 36.9648 45.889 37.0271C45.9338 37.0894 45.967 37.1586 45.9866 37.2317C46.0063 37.3048 46.0118 37.3801 46.0028 37.454C45.9938 37.5278 45.9705 37.5988 45.9349 37.6625C45.8993 37.7261 45.8518 37.7813 45.7954 37.8233C45.739 37.8653 45.6755 37.8923 45.6094 37.9022C45.5433 37.9121 45.4761 37.9047 45.4154 37.8807C45.3548 37.8567 45.3028 37.8173 45.2648 37.7666C45.2083 37.6743 45.1906 37.5586 45.2148 37.4464C45.239 37.3341 45.3026 37.2346 45.3944 37.1628C45.4863 37.091 45.6009 37.052 45.7189 37.052C45.7849 37.052 45.8488 37.0623 45.908 37.0824C45.9673 37.1025 46.0207 37.132 46.0659 37.1697C46.1111 37.2075 46.1478 37.2529 46.173 37.3031C46.1981 37.3532 46.2114 37.4074 46.2114 37.4627C46.2114 37.5462 46.1855 37.6287 46.1354 37.7001C46.0852 37.7716 46.0136 37.8293 45.9306 37.8681C45.8839 37.8856 45.8354 37.893 45.7863 37.8903C45.7372 37.8875 45.6886 37.8748 45.6431 37.8526C45.5976 37.8305 45.5556 37.7994 45.5199 37.7607H45.3069Z" fill="#F2F4F8"/>
                                <path d="M31.8002 28.5782L13.5761 38.1262C13.3868 38.2084 13.1817 38.2036 12.9962 38.1136C12.8106 38.0237 12.6667 37.8587 12.601 37.647C12.5558 37.5063 12.551 37.3561 12.5863 37.2107C12.6217 37.0654 12.6956 36.9294 12.7971 36.8171C12.8529 36.7609 12.9207 36.7192 12.9945 36.6942C13.0684 36.6692 13.1462 36.6612 13.2223 36.6702C13.2983 36.6791 13.3692 36.7048 13.4273 36.7468L31.6514 27.1988C31.8407 27.1166 32.0458 27.1214 32.2313 27.2113C32.4169 27.3013 32.5609 27.4663 32.6265 27.6781C32.6717 27.8188 32.6765 27.969 32.6412 28.1144C32.6058 28.2597 32.5319 28.3957 32.4304 28.508C32.3746 28.5643 32.3068 28.606 32.2329 28.631C32.1591 28.656 32.0813 28.664 32.0052 28.6551C31.9292 28.6461 31.8583 28.6205 31.8002 28.5782Z" fill="#1A1A1B"/>
                            </svg> --}}
                            <div class="flex-shrink-0">
                                <img class="h-7 w-100" src="https://www.pal.co.id/wp-content/uploads/2020/07/BUMN-PAL-R1.png" alt="">
                                <span align="left"></span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="hidden md:flex md:items-center md:space-x-6">
                        <a href="#" class="mr-2 text-black hover:text-gray-900">Home</a>
                        <a href="#" class="mr-2 text-black hover:text-gray-900">Tentang Kami</a>            
                        {{-- <div name=""class="relative inline-block text-left">
                            <button class="inline-flex items-center justify-center text-black bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-blue-400">
                              Layanan
                              <!-- Icon untuk menunjukkan panah ke bawah -->
                              <svg class="w-4 h-4 ml-2 -mr-1 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                              </svg>
                            </button>
                            <!-- Daftar dropdown -->
                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg">
                              <div class="py-1">
                                <!-- Item dropdown -->
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Action 1</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Action 2</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Action 3</a>
                              </div>
                            </div>
                          </div>                           --}}

                          {{-- Dropdown dari agil --}}                                                  
                            <!-- Copyright notice --> 
                        <div class="container mx-auto py-8">
                            <!-- Dropdown with dividers -->
                            <div class="mr-2 relative inline-block text-left">
                              <div>
                                <button type="button" class="inline-flex item-center justify-center bg-blue-400 font-san-serif text-black ring-1 ring-inset ring-blue-400" id="menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleDropdown()">
                                  Layanan
                                  <svg class="h-5 text-black" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                  </svg>
                                </button>
                              </div>
                        
                              <!-- Dropdown menu with dividers -->
                              <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" style="display: none;" id="dropdown-menu">
                                <div class="py-1" role="none">
                                  <!-- Menu items with dividers -->
                                  <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
                                  <a href="#" class="text-gray-700 block px-4 py-2 text-sm border-t border-gray-200" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
                                  <a href="#" class="text-gray-700 block px-4 py-2 text-sm border-t border-gray-200" role="menuitem" tabindex="-1" id="menu-item-2">License</a>
                                </div>
                              </div>
                        </div>                          
                        <a href="#" class="text-black hover:text-gray-900">Informasi</a>
                        <a href="#" class="text-black hover:text-gray-900">Kontak</a>
                        <a href="{{ route('login') }}" class="right--5 inline-flex items-center justify-center px-3 py-1 border border-transparent rounded-md shadow-sm text-white bg-gray-600 hover:bg-black-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Log In</a>
                    </div>

                </div>
            </div>
            {{-- <div class="md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="#" class="text-gray-500 hover:text-gray-900">Home</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">About</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">Services</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">Contact</a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="px-5 flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800">Tom Cook</div>
                            <div class="text-sm font-medium text-gray-500">tom@example.com</div>
                        </div>
                        <button type="button" class="ml-auto bg-gray-100 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18v-1a6 6 0 0 1 12 0v1M12 2C9.87827 2 8.07766 3.13201 7.34315 4.75777C7.13309 5.25669 6.76833 5.65647 6.3 5.90389C5.78265 6.1831 5.29421 6.55777 4.87465 7.01194C3.69789 8.17658 3 9.79213 3 12v4l-1 1v1h20v-1l-1-1v-4c0-2.20787-.697887-3.82342-1.87465-4.98806C18.7058 6.55777 18.2173 6.1831 17.7 5.90389C17.2317 5.65647 16.8669 5.25669 16.6569 4.75777C15.9223 3.13201 14.1217 2 12 2Z"/>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 px-2 space-y-1">
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Your Profile</a>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Settings</a>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Sign out</a>
                    </div>
                </div>
            </div> --}}       
        </nav>
        <script>
            function toggleDropdown() {
              var dropdownMenu = document.getElementById("dropdown-menu");
              var menuButton = document.getElementById("menu-button");
        
              if (dropdownMenu.style.display === "none") {
                dropdownMenu.style.display = "block";
                menuButton.setAttribute("aria-expanded", "true");
              } else {
                dropdownMenu.style.display = "none";
                menuButton.setAttribute("aria-expanded", "false");
              }
            }
        </script>
          
        {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/WxViZVElubI?si=5dKtKXaxlCESMGFh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
        <div id="player"></div>
        <script>
            // Membuat objek pemutar video
            var player;
            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    height: 'auto',
                    width: '100%',
                    videoId: 'WxViZVElubI', // ID unik video YouTube
                    playerVars: {
                        'autoplay': 1, // Mulai pemutaran otomatis
                        'start': 0, // Menit awal video
                        'end': 18, // Menit akhir video
                        'controls': 0, // Sembunyikan kontrol pemutar
                        'mute': 1, // Matikan suara
                        'modestbranding': 1, // Hilangkan logo YouTube
                        'rel': 0, // Sembunyikan video terkait
                        'showinfo': 0 // Sembunyikan nama pengunggah
                    },
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }
            
            // Fungsi yang dipanggil saat pemutar video siap
            function onPlayerReady(event) {
                // Mulai pemutaran video
                event.target.playVideo();

                // Atur lebar video sesuai dengan lebar body website
                var bodyWidth = document.body.clientWidth;
                player.setSize(bodyWidth, Math.floor(bodyWidth / 16 * 9)); // Aspek rasio 16:9
            }

            // Ketika status pemutar video berubah
            function onPlayerStateChange(event) {
                // Cek apakah video selesai
                if (event.data == YT.PlayerState.ENDED) {
                    // Mulai ulang video dari awal
                    player.seekTo(0);
                }
            }
        </script>
        <!-- Memuat API YouTube Player -->
        <script src="https://www.youtube.com/iframe_api"></script>
    </body>
</html>
