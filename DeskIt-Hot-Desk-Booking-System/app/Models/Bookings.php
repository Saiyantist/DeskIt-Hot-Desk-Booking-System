<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        "booking_date",
        "booking_time",
        "status",
        "user_id",
        "desk_id",
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Bookings) {
            $autoAccept = config('bookings.auto_accept');

            if ($autoAccept) {
                $Bookings->status = 'accepted';
            }

            else if (!$autoAccept){
                $Bookings->status = 'pending';
            }
        });
        
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function desk()
    {
        return $this->belongsTo(Desk::class, 'desk_id');
    }
}