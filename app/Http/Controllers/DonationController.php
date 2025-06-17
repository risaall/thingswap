<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Category;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('user.contribute', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'condition' => 'required|in:baru,seperti-baru,layak-pakai,rusak-ringan,rusak-berat,tidak-layak',
            'description' => 'nullable|string',
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:5120',
            'donor_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $photoPaths = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('donation_photos', 'public');
            }
        }

        Donation::create([
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,
            'condition' => $request->condition,
            'description' => $request->description,
            'photos' => $photoPaths,
            'donor_name' => $request->donor_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => 'pending',
            'user_id' => auth()->id(), // ⬅ Tambahkan ini
        ]);

        return response()->json(['message' => 'Donasi berhasil dikirim.']);

    }
}
    
