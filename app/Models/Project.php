<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function worklog()
    {
        return $this->hasMany(Worklog::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
