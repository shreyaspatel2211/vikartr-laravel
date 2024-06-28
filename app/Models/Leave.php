<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = "leaves";
    use HasFactory;

    protected $fillable = ['leave_type', 'from', 'to','duration', 'note', 'status','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
