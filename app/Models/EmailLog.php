<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    protected $table = 'email_logs';
    use HasFactory;
    protected $fillable = [
        'contact_id',
        'email',
        'status',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
