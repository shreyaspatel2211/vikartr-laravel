<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'author', 'question'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}