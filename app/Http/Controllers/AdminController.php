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
    
    // Pilih salah satu sesuai kebutuhan:
    // Opsi 1: Hitung user yang punya donation di tabel donations
    $donorUserCount = User::whereHas('donations')->count();
    
    // Opsi 2: Hitung user yang punya product type donation
    // $donorUserCount = User::whereHas('donationProducts')->count();
    
    $productCount = Product::where('type', 'sell')->count();
    $donationCount = Donation::count(); // Dari tabel donations
    // atau $donationCount = Product::where('type', 'donation')->count(); // Dari tabel products
    
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

    public function donations(Request $request) 
    {
        $status = $request->query('status');
        
        // PERBAIKAN: Batasi query untuk menghindari memory issue
        $query = Donation::with(['category', 'user']);
        
        if ($status) {
            $query->where('status', $status);
        }
        
        // Batasi hasil untuk menghindari memory exhausted
        $donations = $query->latest()->paginate(10);
        
        return view('admin.donations.index', compact('donations')); 
    }
}