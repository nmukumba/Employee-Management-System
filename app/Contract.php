<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function employee() {
    	return $this->belongsTo(Employee::class);
    }

    public function company() {
        return $this->hasOne(Company::class);
    }

    public function branch() {
        return $this->hasOne(Branch::class);
    }

    public function department() {
        return $this->hasOne(Department::class);
    }

    public function role() {
        return $this->hasOne(Role::class);
    }
}
