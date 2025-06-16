<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\Donation;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $donorUserCount = User::whereHas('donations')->count(); // relasi 'donations' harus ada
        $productCount = Product::where('type', 'sell')->count();
        $donationCount = Product::where('type', 'donation')->count();
        $recycledCount = Product::where('type', 'recycled')->count();
        $partnerCount = Partner::count();

        return view('admin.dashboard', compact(
            'userCount',
            'donorUserCount',
            'productCount',
            'donationCount',
            'recycledCount',
            'partnerCount'
        ));
    }

    public function products()
    {
        // Misal: return view produk admin
        return view('admin.products.index');
    }

    public function donations(Request $request)
{
    $status = $request->query('status');
    $query = Donation::with('category', 'user');    

    if ($status) {
        $query->where('status', $status);
    }

    $donations = $query->get();

    return view('admin.donations.index', compact('donations'));
}
}
