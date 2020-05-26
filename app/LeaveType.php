<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    public function leaveHistory(){
    	return $this->belongsTo(LeaveHistory::class);
    }
}
