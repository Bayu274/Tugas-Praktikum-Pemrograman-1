<?php

namespace App\Http\Controllers\User; // Namespace harus benar

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // View yang dipanggil saat user biasa login
        $kegiatan = Kegiatan::withCount('pendaftaran')->get();
        return view('dashboard',compact('kegiatan')); 
    }
}   