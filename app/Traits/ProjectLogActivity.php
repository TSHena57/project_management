<?php

namespace App\Traits;

use Request;
use Carbon\Carbon;
use App\Models\ActivityLog;

trait ProjectLogActivity
{
    public function addLog($user_id, $project_id, $project_module_id, $subject, $details = null, $url = null)
    {
        ActivityLog::create([
            'user_id' => $user_id,
            'project_id' => $project_id,
            'project_module_id' => $project_module_id,
            'subject' => $subject,
            'details' => $details,
            'url' => $url,
            'ip' => Request::ip(),
        ]);
    }
}