<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subject',
        'status',
        'json',
    ];

    public function emailLogs()
    {
        return $this->hasMany(EmailLog::class);
    }
}
