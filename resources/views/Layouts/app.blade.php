<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'SIPKK') - Pendaftaran Kegiatan</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 font-sans text-slate-900 antialiased">
    
    {{-- Container utama dengan padding dan posisi di tengah --}}
    <div class="container mx-auto mt-10 max-w-5xl px-4">
        
        {{-- Di sinilah konten dari halaman lain akan disisipkan --}}
        @yield('content')

    </div>

</body>
</html>