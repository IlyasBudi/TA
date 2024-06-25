<?php

namespace App\Http\Controllers;

use App\Models\destination;
use App\Models\kantor_cabang;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\Storage;
use Illuminate\support\Str;

class DestinationController extends Controller
{
    public function index()
    {
        $staff_id = Auth::id();
        $kantorcabang_id = kantor_cabang::where('staff_id', $staff_id)->first()->id;

        $destination = destination::where('kantor_cabang_id', $kantorcabang_id)->get();
        return view('staff.destination.index', ['destination' => $destination]);
    }

    public function create()
    {
        return view('staff.destination.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            "name" => "required|string",
            "description" => "required|string|max:65535",
            "image" => "required|mimes:jpg,jpeg,png|max:5120",
            "price" => "required|integer",
        ]);

        $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));

        $staff_id = Auth::id();
        $kantorcabang_id = kantor_cabang::where("staff_id", $staff_id)->first()->id;

        destination::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $saveImage['image'],
            'price' => $validated['price'],
            'kantor_cabang_id' => $kantorcabang_id,
        ]);

        return redirect('/staff/destination');
    }

    public function show(string $id)
    {
        $destination = destination::find($id);
        return view('staff.destination.show', ['destination' => $destination]);
    }

    public function edit (string $id)
    {
        $destination = destination::findOrFail($id);
        return view('staff.destination.edit', ['destination' => $destination]);
    }

    public function update(Request $request, string $id)
    {
        $destination = destination::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:65535',
            'image' => 'mimes:jpg, jpeg, png|max:10240',
            'price' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($destination->image);

            $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));
        } else {
            $newImage = ['image' => $destination->image];
        }

        $destination->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $newImage['image'],
            'price' => $validated['price'],
        ]);

        return redirect('/staff/destination');
    }

    public function destroy(string $id)
    {
        destination::destroy($id);
        return redirect('/staff/destination');
    }
}
