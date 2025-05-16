<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->withDefault();
    }
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id','id')->withDefault();
    }

    public function project_module()
    {
        return $this->belongsTo(ProjectModule::class,'project_module_id','id')->withDefault(['module_name'=>'n/a']);
    }
}
