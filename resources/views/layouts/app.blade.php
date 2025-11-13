<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Peminjaman Ruangan Desa</title>
    <style>
        @include('layouts.css')
    </style>
</head>

<body>

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')
</body>

</html>
