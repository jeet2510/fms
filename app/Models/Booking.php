<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'date',
        'customer_id',
        'receiver_id',
        'driver_id',
        'route_id',
        'buying_amount',
        'border_charges',
        'total_booking_amount',
        'created_by',
      ];

      public function customer()
      {
          return $this->belongsTo(Customer::class);
      }

      public function route()
      {
          return $this->belongsTo(Route::class);
      }

      public function drivers()
      {
          return $this->belongsToMany(Driver::class);
      }



}
