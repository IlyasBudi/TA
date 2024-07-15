<?php

namespace App\Http\Controllers;

use App\Models\bus;
use App\Models\category_bus;
use App\Models\destination;
use App\Models\kantor_cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $kantorcabang = kantor_cabang::with('bus','destination' , 'staff')->findOrFail($id);
        return view('penyewa.detailkantorcabang', ['kantorcabang' => $kantorcabang]);
    }

    public function bookingpage()
    {
        // $staff_id = Auth::id();
        // $kantorcabang_id = kantor_cabang::where('id', $id)->first()->id;
        $kantorcabang = kantor_cabang::all();
        $categorybus = category_bus::all();
        // $categorybus_id = category_bus::where('id', $id)->first()->id;
        
        // $bus = bus::where('kantorcabang_id', $kantorcabang_id, 'categorybus_id', $categorybus_id, 'status', 'Tersedia')->get();

        return view('penyewa.bookingpage', ['kantorcabang' => $kantorcabang, 'categorybus' => $categorybus]);
    }

//     public function getBusesByCategoryAndStatus($categorybus_id, $status)
// {
//     $buses = Bus::where('categorybus_id', $categorybus_id)
//                 ->where('status', $status)
//                 ->get(['id', 'name']);

//     return response()->json($buses);
// }


    // KantorCabangController.php
    // public function handleData(Request $request, $id)
    // {
    //     $kantorcabang_id = $request->input('kantorcabang_id');
    //     // $kantorcabang_id = kantor_cabang::where('id', $id)->first()->id;
    //     // $categorybus_id = category_bus::where('id', $id)->first()->id;
    //     // $bus = bus::where('kantorcabang_id', $kantorcabang_id, 'categorybus_id', $categorybus_id, 'status', 'Tersedia')->get();
    //     // // Lakukan sesuatu dengan $kantorcabangId, misalnya simpan ke database atau proses lainnya

    //     // return view('penyewa.bookingpage2', ['kantorcabang_id' => $kantorcabang_id, 'categorybus_id' => $categorybus_id, 'bus' => $bus]);
    //     return response()->json(['success' => true]);
    // }

    public function getData(Request $request)
    {
        $kantorcabang_id = $request->kantorcabang_id;
        $store = kantor_cabang::find($kantorcabang_id);

        if ($store) {
            return response()->json([
                'success' => true,
                'data' => $store,
            ]);
        }

        return response()->json(['success' => false], 404);
    }

    public function bookingPageId($id)
    {
        // $bus = bus::all();
        $kantorcabang = kantor_cabang::with('bus','destination' , 'staff')->findOrFail($id);
        return view('penyewa.bookingpage', ['kantorcabang' => $kantorcabang]);
    }

}
