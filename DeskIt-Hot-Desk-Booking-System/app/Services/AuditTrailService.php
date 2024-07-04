<?php

namespace App\Services;

use App\Models\AuditTrail;

class AuditTrailService
{
    public static function createTrail($email = null, $action_type, $action_details, $status, $additional_context = null)
    {
        AuditTrail::create([
            'user_id' => auth()->id(),
            'email' => $email,
            'action_type' => $action_type,
            'action_details' => $action_details,
            'status' => $status,
            'additional_context' => $additional_context,
            'ip_address' => request()->ip()
        ]);
    }
}
