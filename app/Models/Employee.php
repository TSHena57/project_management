<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['user_id','designation_id','department_id','employee_id','address','is_active'];
    
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    
    public function designation()
    {
        return $this->belongsTo(Designation::class)->withDefault();
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class)->withDefault();
    }
}
