<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageLog extends Model
{
    protected $table = 'message_logs';
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'email',
        'phone',
        'status',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
