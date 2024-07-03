<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'description',
        'type',
        'status',
        'user_id',
        'desk_id',
        'resolved_at',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function desk()
    {
        return $this->belongsTo(Desk::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function scopeSearch($query, $value)
    {
        $query
        ->where('users.name', 'like', "%{$value}%")
        ->orWhere('desks.desk_num', 'like', "%{$value}%")
        ->orWhere('subject', 'like', "%{$value}%");
    }
}
