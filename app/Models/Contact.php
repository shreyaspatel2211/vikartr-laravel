<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone','city_id', 'state_id', 'country_id', 'company_id', 'address', 'designation'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function emailLogs()
    {
        return $this->hasMany(EmailLog::class);
    }

    public function messageLogs()
    {
        return $this->hasMany(MessageLog::class);
    }
}
