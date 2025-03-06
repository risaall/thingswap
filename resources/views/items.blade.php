<!-- resources/views/items.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Barang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Kondisi</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->condition }}</td>
                <td>{{ $item->location }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
