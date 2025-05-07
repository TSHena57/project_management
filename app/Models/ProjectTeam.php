<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    protected $fillable = ['project_id','employee_id','join_date','role_play'];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id')->withDefault();
    }

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id','id')->withDefault();
    }
}
