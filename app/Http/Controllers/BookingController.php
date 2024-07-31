<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Models\admin;
use App\Models\booking;
use App\Models\category_bus;
use App\Models\destination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    public function booking(Request $request)
    {
        $code = 'TRANS-' . mt_rand(000, 999);

        $validated = $request->validate([
            // 'code' => 'required',
            'admin_id' => 'required',
            'user_id' => 'required',
            'destination_id' => 'required',
            'category_bus_id' => 'required',
            'departure_date' => 'required',
            'arrival_date' => 'required',
            'pickup_time' => 'required',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
        ]);

        $admin_id = 1;
        $user_id = Auth::user()->id;

        $booking = booking::create([
            'code' => $code,
            'admin_id' => $admin_id,
            'user_id' => $user_id,
            'destination_id' => $validated['destination_id'],
            'category_bus_id' => $validated['category_bus_id'],
            'departure_date' => $validated['departure_date'],
            'arrival_date' => $validated['arrival_date'],
            'pickup_time' => $validated['pickup_time'],
            'longitude' => $validated['longitude'],
            'latitude' => $validated['latitude'],
        ]);

        // $booking->save();
        // dd($booking);
        return redirect('/')->with('Success', 'Booking berhasil dibuat!');
    }
}
