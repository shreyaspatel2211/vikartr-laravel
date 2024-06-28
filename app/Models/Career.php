<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'careers';
    use HasFactory;
    protected $fillable = ['designation', 'image','experience', 'city_id', 'slug'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
