<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\booking;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function transaction()
    {
        $transaction = booking::with(['user', 'category_bus'])->get();

        return view('admin.transaction.index', compact('transaction'));
    }

    public function destroy(string $id)
    {
        booking::destroy($id);
        return redirect('/admin/transaction');
    }

    // public function show(string $id)
    // {
    //     $kantorcabang = kantor_cabang::with('staff')->findOrFail($id);
    //     return view('staff.kantorcabang.show', ['kantorcabang' => $kantorcabang]);
    // }

    // public function show(booking $booking)
    // {
    //     $details = booking::with(['user', 'category_bus'])->findOrFail($id);
    //     return view('admin.transaction.show', ['booking' => $booking]);
    // }

    public function show(string $id)
    {
        $transaction = booking::with(['user', 'category_bus'])->findOrFail($id);
        return view('admin.transaction.show', ['transaction' => $transaction]);
    }
}
