<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    public function employee(){
    	return $this->belongsTo(Employee::class);
    }

    public function qualificationType(){
    	return $this->hasOne(QualificationType::class);
    }
}
