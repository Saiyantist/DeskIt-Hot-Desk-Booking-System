<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [ 'subject', 'description', 'type', 'status', 'user_id',];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function response()
    {
        return $this->hasMany(Response::class);
    }
}
