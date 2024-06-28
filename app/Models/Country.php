<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    use HasFactory;

    public function state()
    {
        return $this->hasMany(State::class);
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
}
