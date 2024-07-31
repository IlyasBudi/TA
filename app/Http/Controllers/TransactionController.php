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
        $transaction = booking::with(['user', 'destination', 'category_bus'])->get();

        return view('admin.transaction.index', compact('transaction'));
    }

    public function show(booking $transaction)
    {
        $details = $transaction->detail_transactions()->get();

        return view("admin.transaction.show", compact("transaction", "details"));
    }
}
