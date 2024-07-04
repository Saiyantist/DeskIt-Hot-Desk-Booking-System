<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "email",
        "action_type",
        "action_details",
        "status",
        "additional_context",
        "ip_address"
    ];
}
