<?php

namespace App\Http\Controllers;

use App\Models\bus;
use App\Models\destination;
use App\Models\kantor_cabang;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    public function landingpage()
    {
        
        return view("penyewa.landingpage");
    }

    public function about()
    {
        $kantorcabangs = kantor_cabang::all();
        return view("penyewa.about", ["kantorcabangs" => $kantorcabangs]);
    }

    public function detailKantorCabang($id)
    {
        // $bus = bus::all();
        $kantorcabang= kantor_cabang::with('bus','destination' , 'staff')->findOrFail($id);
        return view('penyewa.detailkantorcabang', ['kantorcabang' => $kantorcabang]);
    }

    public function bookingpage()
    {
        
        return view("penyewa.bookingpage");
    }
}
