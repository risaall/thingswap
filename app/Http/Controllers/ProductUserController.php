<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductUserController extends Controller
{
    public function index(Request $request)
{
    $query = Product::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('type')) {
        $query->where('type', $request->type); // 'dijual' atau 'daur ulang'
    }

    $products = $query->latest()->get();

    return view('user.products.index', compact('products'));
}

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('user.products.show', compact('product'));
    }
}
