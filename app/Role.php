<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function contracts(){
    	return $this->hasMany(Contract::class);
    }


}
