<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingMaster extends Model
{
    use HasFactory;

    protected $table = 'bookingmasters';

    protected $fillable = [
        'booking_personname',
        'phonenumber',
        'mail',
        'address',
        'totalnumber',
        'tour_id',
        'totalamount',
        'bookingdate',
        'pickuplocation',
        'payment_status',
        'payment_mode',
        'received_amount',
        'pending_amount',
        'cus_id',
        'discount',
        'addons',
        'emergency_number',
        'relationship'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

    public function transactions()
    {
        return $this->hasMany(BookingTrans::class, 'bookid');
    }
    
}