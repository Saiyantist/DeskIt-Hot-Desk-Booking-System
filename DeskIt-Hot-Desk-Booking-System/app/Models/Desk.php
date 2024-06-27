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
        "status",
        'amenities',
    ];

    protected $casts = [
        'amenities' => 'array',
    ];

    public function bookings()
    {
        return $this->hasMany(Bookings::class, 'desk_id');
    }

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
