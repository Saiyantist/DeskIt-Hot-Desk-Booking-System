<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "desk_num",
        "status"
    ];

    public function booking()
    {
        return $this->hasMany(Bookings::class, 'desk_id');
    }

    public function issue()
    {
        return $this->hasMany(Issue::class);
    }
}
