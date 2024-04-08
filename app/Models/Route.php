<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [

        'destination_city_id',
        'origin_city_id',
        'created_by',
        'border_id',
        'route',
        'fare',

    ];

    // Route.php
    public function originCity()
    {
        return $this->belongsTo(City::class, 'origin_city_id');
    }

    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destination_city_id');
    }

   // Route.php

//    public function borders()
//    {
//        return $this->belongsToMany(Border::class);
//    }

public function border()
    {
        return $this->belongsTo(Border::class, 'border_id');
    }


    // Route model
// public function borders()
// {
//     return $this->belongsToMany(Border::class);
// }


}
