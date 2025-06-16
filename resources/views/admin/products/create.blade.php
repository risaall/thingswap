@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Produk</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @includeIf('admin.products.form', ['product' => null])
    </form>
</div>
@endsection
@section('scripts')
<script>
function formatHarga(input) {
    let value = input.value.replace(/\D/g, '');
    if (value) {
        input.value = new Intl.NumberFormat('id-ID').format(value);
    } else {
        input.value = '';
    }
}
</script>
@endsection
