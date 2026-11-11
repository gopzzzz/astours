<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Str;

class ToursController extends Controller
{
    // LIST
    public function index(Request $request)
    {
    $today=date('y-m-d');
    $tours = DB::table('tours')
    ->when($request->filled('search'), function ($query) use ($request) {
        $query->where('tourname', 'like', '%' . $request->search . '%');
    })
    ->when($request->filled('from_date'), function ($query) use ($request) {
        $query->whereDate('date', '>=', $request->from_date);
    })
    ->when($request->filled('to_date'), function ($query) use ($request) {
        $query->whereDate('date', '<=', $request->to_date);
    })
    ->where('date','>',$today)
    ->orderBy('id', 'desc')
    ->paginate(10)
    ->withQueryString();
        $staff=DB::table('staff_registrations')->get();

        return view('tours', compact('tours','staff'));
    }

   public function export(Request $request)
{
    $tours = DB::table('tours')
        ->when($request->filled('search'), function ($query) use ($request) {
            $query->where('tourname', 'like', '%' . $request->search . '%');
        })
        ->when($request->filled('from_date'), function ($query) use ($request) {
            $query->whereDate('date', '>=', $request->from_date);
        })
        ->when($request->filled('to_date'), function ($query) use ($request) {
            $query->whereDate('date', '<=', $request->to_date);
        })
        ->orderBy('id', 'desc')
        ->get();

    return response()->streamDownload(function () use ($tours) {

        $file = fopen('php://output', 'w');

        // CSV Header
        fputcsv($file, [
            'ID',
            'Travel Mode',
            'Tour Name',
            'Price',
            'Date',
            'Total Seat',
            'Pickup Locations'
        ]);

        // CSV Data
        foreach ($tours as $tour) {
            fputcsv($file, [
                $tour->id,
                $tor->package_type,
                $tour->tourname,
                $tour->amount,
                $tour->date,
                 $tour->total_seats,
                $tour->pickuplocations
            ]);
        }

        fclose($file);

    }, 'tours.csv');
}


    // ADD
    public function store(Request $request)
    {
        $request->validate([
            'tourname' => 'required|string|max:150',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'features' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'total_seats' => 'required|integer|min:1',
            'date' => 'required|date',
            'time' => 'required',
            'pickuplocations' => 'required|string|max:255',
        ]);

        $uploadPath = public_path('uploads/tours');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $imageName = time() . '_' . $request->image->getClientOriginalName();

        $request->image->move($uploadPath, $imageName);

        $slug = Str::slug(
            $request->tourname . '-' . $request->date
        );

        DB::table('tours')->insert([
            'tourname' => $request->tourname,
            'package_type' => $request->mode,
            'image' => $imageName,
            'slug'  =>$slug,
            'features' => $request->features,
            'description' => $request->description,
            'amount' => $request->amount,
            'total_seats' => $request->total_seats,
            'date' => $request->date,
            'time' => $request->time,
            'pickuplocations' => $request->pickuplocations,
            'staff_id' => $request->staff,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('tours.index')
            ->with('success', 'Tour added successfully.');
    }


    // EDIT / UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'tourname' => 'required|string|max:150',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'features' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'total_seats' => 'required|integer|min:1',
            'date' => 'required|date',
            'time' => 'required',
            'pickuplocations' => 'required|string|max:255',
        ]);

        $tour = DB::table('tours')
            ->where('id', $id)
            ->first();

        if (!$tour) {
            return redirect()->route('tours.index')
                ->with('error', 'Tour not found.');
        }

        $imageName = $tour->image;

        // Replace old image
        if ($request->hasFile('image')) {

            if ($tour->image) {
                $oldImage = public_path('uploads/tours/' . $tour->image);

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $uploadPath = public_path('uploads/tours');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $imageName = time() . '_' . $request->image->getClientOriginalName();

            $request->image->move($uploadPath, $imageName);
        }

        DB::table('tours')
            ->where('id', $id)
            ->update([
                'tourname' => $request->tourname,
                'package_type' => $request->mode,
                'image' => $imageName,
                'features' => $request->features,
                'description' => $request->description,
                'amount' => $request->amount,
                'total_seats' => $request->total_seats,
                'date' => $request->date,
                'time' => $request->time,
                'pickuplocations' => $request->pickuplocations,
                'staff_id' => $request->staff,
                'updated_at' => now(),
            ]);

        return redirect()->route('tours.index')
            ->with('success', 'Tour updated successfully.');
    }
}