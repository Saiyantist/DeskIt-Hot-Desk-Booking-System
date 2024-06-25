<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

use App\Notifications\AdminToggleNotification;
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

            else if (!$autoAccept) {
                $Bookings->status = 'pending';
            
                // Notify admin users
                $adminUsers = User::whereHas('roles', function($query) {
                    $query->whereIn('name', ['admin', 'superadmin']);
                })->get();

                foreach ($adminUsers as $adminUser) {
                    // Notify each admin user about the new booking
                    $adminUser->notify(new AdminToggleNotification($adminUser->roles->pluck('name')->implode(', ')));
                }
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