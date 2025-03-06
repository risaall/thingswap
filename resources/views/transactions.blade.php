<!-- resources/views/transactions.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Transaksi</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Barang</th>
                <th>Pengguna</th>
                <th>Status</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->item->name }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ $transaction->status }}</td>
                <td>{{ $transaction->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
