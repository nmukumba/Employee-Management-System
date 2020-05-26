<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualificationType extends Model
{
    public function qualification(){
    	return $this->belongsTo(Qualification::class);
    }
}
