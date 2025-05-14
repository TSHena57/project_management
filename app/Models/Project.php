<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['project_type_id','slug','client_id','project_manager_id','project_name','open_date','close_date','project_value','description','project_current_status','awarded_by','created_by','updated_by'];
    
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id','id')->withDefault();
    }

    public function project_type()
    {
        return $this->belongsTo(ProjectType::class,'project_type_id','id')->withDefault();
    }

    public function project_manager()
    {
        return $this->belongsTo(Employee::class,'project_manager_id','id')->withDefault();
    }
    
    public function project_teams()
    {
        return $this->hasMany(ProjectTeam::class);
    }
    
    public function project_plans()
    {
        return $this->hasMany(ProjectPlan::class);
    }
    
    public function project_modules()
    {
        return $this->hasMany(ProjectModule::class);
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
