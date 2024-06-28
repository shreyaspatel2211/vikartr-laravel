<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    use HasFactory;
    protected $fillable = ['name', 'description', 'slug', 'image', 'streams', 'long_description'];
}
