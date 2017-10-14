<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'country_id','latitude','longitude'
    ];

    //relacionamento um para um :: Pertence a country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
