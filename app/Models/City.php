<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }
    public function career()
    {
        return $this->hasMany(Career::class);
    }
}
