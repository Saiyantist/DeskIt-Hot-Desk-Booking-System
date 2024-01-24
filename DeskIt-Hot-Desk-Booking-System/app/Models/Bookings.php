<?php

namespace App\Models;

use App\Models\User;
use App\Models\Desk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        "booking_date",
        "status",
        
        "user_id",
        "desk_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function desk()
    {
        return $this->belongsTo(Desk::class, 'desk_id');
    }
}
