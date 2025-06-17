<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>DEBUG DONASI</h1>
@if (isset($donations))
    <p>Variabel $donations terdefinisi di view debug!</p>
    @forelse ($donations as $donation)
        <p>Donasi ID: {{ $donation->id ?? 'N/A' }}, Nama: {{ $donation->name ?? 'N/A' }}</p>
    @empty
        <p>Tidak ada donasi di database (tapi variabel terdefinisi).</p>
    @endforelse
@else
    <p>ERROR: Variabel $donations TIDAK terdefinisi di view debug!</p>
@endif
</body>
</html>