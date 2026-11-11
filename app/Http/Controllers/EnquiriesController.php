<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnquiriesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST ENQUIRIES
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $enquiries = DB::table('enquires')
            ->orderBy('id', 'asc')
            ->get();

        return view('enquiries', compact('enquiries'));
    }


    /*
    |--------------------------------------------------------------------------
    | ADD ENQUIRY
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        DB::table('enquires')->insert([
            'name' => $request->name,
            'phonenumber' => $request->phonenumber,
            'location' => $request->location,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('enquiries.index')
            ->with('success', 'Enquiry added successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE ENQUIRY
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        DB::table('enquires')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'phonenumber' => $request->phonenumber,
                'location' => $request->location,
                'message' => $request->message,
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('enquiries.index')
            ->with('success', 'Enquiry updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE ENQUIRY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        DB::table('enquires')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->route('enquiries.index')
            ->with('success', 'Enquiry deleted successfully.');
    }
}