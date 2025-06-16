<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function showProducts()
    {
        $products = Product::with('category')->latest()->get(); // tambah eager loading
        return view('user.produk', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Bersihkan titik dari harga sebelum validasi
        $request->merge([
            'price' => str_replace('.', '', $request->price),
        ]);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|min:0',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:sell,donation,recycled',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Bersihkan titik dari harga sebelum validasi
        $request->merge([
            'price' => str_replace('.', '', $request->price),
        ]);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|min:0',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:sell,donation,recycled',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $product->image,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus');
    }
}
