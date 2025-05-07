<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPlan extends Model
{
    protected $fillable = ['project_id','project_phase_id','project_module_id','task_name','task_details','employee_id','current_status','task_duration_hrs','start_date','end_date','created_by','updated_by'];
    
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id','id')->withDefault();
    }

    public function project_phase()
    {
        return $this->belongsTo(ProjectPhase::class,'project_phase_id','id')->withDefault();
    }

    public function project_module()
    {
        return $this->belongsTo(ProjectModule::class,'project_module_id','id')->withDefault();
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id')->withDefault();
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
