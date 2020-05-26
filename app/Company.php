<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $guarded = [];

    public function contracts()
    {
        return $this->hasMany(Contracts::class);
    }

    public function branches(){
    	return $this->hasMany(Branch::class);
    }
}
