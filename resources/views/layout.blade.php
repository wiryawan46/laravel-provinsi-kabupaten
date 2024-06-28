<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>
<body>
<div class="container">
    <nav>
        <ul>
            <li><a href="{{ route('provinsis.index') }}">Provinsi</a></li>
            <li><a href="{{ route('kabupatens.index') }}">Kabupaten</a></li>
            <li><a href="{{ route('laporan.provinsi') }}">Laporan Per Provinsi</a></li>
            <li><a href="{{ route('laporan.kabupaten') }}">Laporan Per Kabupaten</a></li>
        </ul>
    </nav>
    @yield('content')
</div>
</body>
</html>
