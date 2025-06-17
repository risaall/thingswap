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
    try {
        // Use select to limit fields and chunk for counts
        $userCount = User::count();
        $donorUserCount = User::whereHas('donations')->count();
        $productCount = Product::where('type', 'sell')->count();
        $donationCount = Donation::count();
        $recycledCount = Product::where('type', 'recycled')->count();
        $partnerCount = Partner::count();

        // Get paginated donations with minimal data
        $donations = Donation::select([
            'id', 
            'name', 
            'status', 
            'condition', 
            'user_id', 
            'category_id'
        ])
        ->with([
            'category:id,name',
            'user:id,name'
        ])
        ->latest()
        ->paginate(5); // Reduced to 5 items per page

        return view('admin.dashboard', compact(
            'userCount',
            'donorUserCount',
            'productCount', 
            'donationCount',
            'recycledCount',
            'partnerCount',
            'donations'
        ));
    } catch (\Exception $e) {
        \Log::error('Dashboard error: ' . $e->getMessage());
        return view('admin.dashboard')->with('error', 'Error loading dashboard data');
    }
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