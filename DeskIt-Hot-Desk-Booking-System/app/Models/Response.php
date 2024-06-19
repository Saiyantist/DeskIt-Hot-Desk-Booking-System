<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable =['text', 'issue_id'];

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
}
