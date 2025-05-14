<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectModule extends Model
{
    protected $fillable = ['project_id','project_phase_id','module_name','is_active','created_by','updated_by','description'];

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id','id')->withDefault();
    }

    public function project_phase()
    {
        return $this->belongsTo(ProjectPhase::class,'project_phase_id','id')->withDefault(['name' => 'No Phase Selected Yet']);
    }
    
    public function project_plans()
    {
        return $this->hasMany(ProjectPlan::class, 'project_module_id', 'id');
    }
    
    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_module_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault(['name'=>'N/A']);
    }

    public function updator()
    {
        return $this->belongsTo(User::class, 'updated_by')->withDefault(['name'=>'N/A']);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = auth()->user()->id ?? null;
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->user()->id ?? null;
        });
    }
}
