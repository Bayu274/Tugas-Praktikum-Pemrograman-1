<?php

namespace App\Http\Controllers\Admin; // Namespace harus benar

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::withCount('pendaftaran')->get();
        // View yang dipanggil saat admin login
        return view('admin.dashboard',compact('kegiatan')); 
    }
}