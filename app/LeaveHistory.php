<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveHistory extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function leaveType(){
    	return $this->hasOne(LeaveType::class);
    }
}
