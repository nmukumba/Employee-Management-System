<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function contract() {
        return $this->hasMany(Contract::class);
    }

    public function department(){
    	return $this->hasOne(Department::class);
    }

    public function qualifications(){
        return $this->hasMany(Qualification::class);
    }

    public function documents(){
        return $this->hasMany(Documents::class);
    }

    public function contactDetail(){
        return $this->hasOne(ContactDetail::class);
    }

    public function warnings(){
        return $this->hasMany(Warnimg::class);
    }

    public function workTools(){
        return $this->hasMany(WorkTool::class);
    }

    public function leaveHistory(){
        return $this->hasMany(LeaveHistory::class);
    }
}
