<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use DB;
use auth;

class AppServiceProvider extends ServiceProvider
{
public function boot()
{
    Paginator::useBootstrapFive();

  

          $populartours = DB::table('tours')
        ->whereBetween('date', [
        now()->startOfDay(),
        now()->endOfMonth()->endOfDay()
    ])
    ->limit(6)
    ->get();

   

    

    View::share('populartours', $populartours);
    // View::share('role', $role);
}
}
