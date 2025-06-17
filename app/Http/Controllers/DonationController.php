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

        return redirect()->back()->with('success', 'Donation berhasil dikirim!');
    }

    public function index(Request $request)
{
    $status = $request->query('status');
    $query = Donation::with('category', 'user');

    if ($status) {
        $query->where('status', $status);
    }

    $donations = $query->paginate(10); // ✅ gunakan pagination

    return view('admin.donations.index', compact('donations'));
}


public function updateStatus($id, $status)
{
    $donation = Donation::findOrFail($id);

    if (!in_array($status, ['accepted', 'rejected'])) {
        return redirect()->back()->with('error', 'Status tidak valid.');
    }

    $donation->status = $status;
    $donation->save();

    return redirect()->route('admin.donations.index')->with('success', 'Status donasi berhasil diperbarui.');
}

}
