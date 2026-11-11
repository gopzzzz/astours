<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BannersController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST BANNERS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $banners = DB::table('banners')
            ->orderBy('id', 'asc')
            ->get();

        return view('banners', compact('banners'));
    }


    /*
    |--------------------------------------------------------------------------
    | ADD BANNER
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'bannerimage' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:10240',
            'bannertitle' => 'required|string|max:255',
        ]);

        // Create folder if it does not exist

        $uploadPath = public_path('uploads/banners');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }


        // Get image

        $image = $request->file('bannerimage');

        $imageName = time() . '_' . $image->getClientOriginalName();


        // Move image

        $image->move($uploadPath, $imageName);


        // Insert database record

        DB::table('banners')->insert([
            'bannerimage' => $imageName,
            'bannertitle' => $request->bannertitle,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner added successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE BANNER
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([
            'bannerimage' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:10240',
            'bannertitle' => 'required|string|max:255',
        ]);


        // Find banner

        $banner = DB::table('banners')
            ->where('id', $id)
            ->first();


        if (!$banner) {

            return redirect()
                ->route('banners.index')
                ->with('error', 'Banner not found.');
        }


        // Keep old image

        $imageName = $banner->bannerimage;


        // If new image selected

        if ($request->hasFile('bannerimage')) {

            // Delete old image

            $oldImage = public_path(
                'uploads/banners/' . $banner->bannerimage
            );

            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }


            // Upload new image

            $image = $request->file('bannerimage');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads/banners'),
                $imageName
            );
        }


        // Update database

        DB::table('banners')
            ->where('id', $id)
            ->update([
                'bannerimage' => $imageName,
                'bannertitle' => $request->bannertitle,
                'updated_at' => now(),
            ]);


        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE BANNER
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $banner = DB::table('banners')
            ->where('id', $id)
            ->first();


        if ($banner) {

            // Delete image

            $imagePath = public_path(
                'uploads/banners/' . $banner->bannerimage
            );

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }


            // Delete database record

            DB::table('banners')
                ->where('id', $id)
                ->delete();
        }


        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner deleted successfully.');
    }
}