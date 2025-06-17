<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Category;

class AdminDonationController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::with('category');

        if ($request->has('status') && in_array($request->status, ['pending', 'accepted', 'rejected'])) {
            $query->where('status', $request->status);
        }

        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('item_name', 'like', "%{$search}%")
                  ->orWhere('donor_name', 'like', "%{$search}%");
            });
        }

        $donations = $query->latest()->get();

        return view('admin.donations.index', compact('donations'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.donations.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name'    => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'condition'    => 'required|in:baru,seperti-baru,layak-pakai,rusak-ringan,rusak-berat,tidak-layak',
            'description'  => 'nullable|string',
            'photos.*'     => 'image|mimes:jpg,jpeg,png|max:5120',
            'donor_name'   => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'email'        => 'required|email|max:255',
            'status'       => 'required|in:pending,accepted,rejected',
        ]);

        $photoPaths = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('donation_photos', 'public');
            }
        }

        Donation::create([
            'item_name'    => $request->item_name,
            'category_id'  => $request->category_id,
            'condition'    => $request->condition,
            'description'  => $request->description,
            'photos'       => $photoPaths,
            'donor_name'   => $request->donor_name,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'status'       => $request->status,
            'user_id'      => auth()->id(), // opsional
        ]);

        return redirect()->route('admin.donations.index')->with('success', 'Donasi berhasil ditambahkan.');
    }

    public function edit(Donation $donation)
    {
        $categories = Category::all();
        return view('admin.donations.edit', compact('donation', 'categories'));
    }

    public function update(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'item_name'    => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'condition'    => 'required|in:baru,seperti-baru,layak-pakai,rusak-ringan,rusak-berat,tidak-layak',
            'description'  => 'nullable|string',
            'donor_name'   => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'email'        => 'required|email|max:255',
            'status'       => 'required|in:pending,accepted,rejected',
            'photos.*'     => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $photos = $donation->photos ?? [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('donation_photos', 'public');
            }
        }

        $validated['photos'] = $photos;

        $donation->update($validated);

        return redirect()->route('admin.donations.index')->with('success', 'Donasi berhasil diperbarui.');
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('admin.donations.index')->with('success', 'Donasi berhasil dihapus.');
    }

    public function show(Donation $donation)
    {
        return view('admin.donations.show', compact('donation'));
    }

    public function updateStatus(Request $request, Donation $donation)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        $donation->update(['status' => $request->status]);

        return redirect()->route('admin.donations.index')->with('success', 'Status donasi diperbarui.');
    }
}
