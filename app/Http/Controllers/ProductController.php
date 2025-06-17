<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function showProducts()
    {
        $products = Product::with('category')->latest()->get();
        return view('user.produk', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Bersihkan format harga
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

        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'type' => $request->type,
        ];

        // Tambahkan user_id jika kolomnya ada
        if (\Schema::hasColumn('products', 'user_id')) {
            $data['user_id'] = auth()->id();
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
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

    public function show($id)
{
    $product = Product::with('category')->findOrFail($id);
    return view('user.products.show', compact('product'));
}

// API Methods

public function storeApi(Request $request)
{
    try {
        // Validasi termasuk image
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string|min:0',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:sell,donation,recycled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',  // validasi image opsional
        ]);

        // Jika ada file gambar, simpan ke storage public/products
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Data produk yang akan disimpan
        $productData = $validated;
        $productData['user_id'] = 1; // atau sesuaikan user id-nya
        $productData['image'] = $imagePath;

        // Buat produk baru
        $product = Product::create($productData);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan via API',
            'data' => $product
        ], 201);

    } catch (\Throwable $e) {
        return response()->json([
            'message' => 'Gagal menambahkan produk',
            'error' => $e->getMessage(),
        ], 500);
    }
}


public function indexApi()
{
    $products = Product::with('category')->latest()->get();

    return response()->json([
        'message' => 'List produk berhasil diambil',
        'data' => $products
    ], 200);
}

}
