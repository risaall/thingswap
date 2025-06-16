<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class AdminDonationController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::with('category');

        if ($request->has('status') && in_array($request->status, ['pending', 'accepted', 'rejected'])) {
            $query->where('status', $request->status);
        }

        $donations = $query->latest()->get();

        return view('admin.donations.index', compact('donations'));
    }

    public function updateStatus(Request $request, Donation $donation)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        $donation->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.donations.index')->with('success', 'Status donasi diperbarui.');
    }
}
