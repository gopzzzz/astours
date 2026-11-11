<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';

    protected $fillable = [
        'tourname',
        'image',
        'features',
        'description',
        'amount',
        'total_seats',
        'date',
        'time',
        'pickuplocations',
        'staff_id',
        'package_type'
    ];

    public function bookings()
    {
        return $this->hasMany(
            BookingMaster::class,
            'tour_id'
        );
    }
}