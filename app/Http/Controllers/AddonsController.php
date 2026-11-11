<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddonsController extends Controller
{
    // LIST
    public function index()
    {
        $addons = DB::table('addons')
            ->orderBy('id', 'asc')
            ->get();

        return view('addons', compact('addons'));
    }


    // ADD
    public function store(Request $request)
{
    $request->validate([
        'addonsname' => 'required|string|max:100',
         'amount' => 'required|string|max:100',
    ]);

    DB::table('addons')->insert([
        'addon' => $request->addonsname,
         'amount' => $request->amount,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('addons.index')
        ->with('success', 'addons added successfully.');
}

    // EDIT / UPDATE
   public function update(Request $request, $id)
{
    $request->validate([
        'addonsname' => 'required|string|max:100',
         'amount' => 'required|string|max:100',
    ]);

    DB::table('addons')
        ->where('id', $id)
        ->update([
            'addon' => $request->addonsname,
             'amount' => $request->amount,
            'updated_at' => now(),
        ]);

    return redirect()->route('addons.index')
        ->with('success', 'Addons updated successfully.');
}
}