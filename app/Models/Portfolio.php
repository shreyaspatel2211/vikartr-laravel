<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    use HasFactory;
    protected $fillable = ['name', 'description', 'country_logo', 'country_id', 'image', 'streams','sourceType', 'source_logo', 'slug'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}