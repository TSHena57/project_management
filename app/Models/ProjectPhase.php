<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPhase extends Model
{
    protected $fillable = ['name','is_active'];
    
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    
    public function project_modules()
    {
        return $this->hasMany(ProjectModule::class);
    }
    
    public function project_plans()
    {
        return $this->hasMany(ProjectPlan::class);
    }
}
