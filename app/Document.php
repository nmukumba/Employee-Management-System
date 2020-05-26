<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function employee(){
    	return $this->belongsTo(Employee::class);
    }

    public function documentType(){
    	return $this->hasOne(DocumentType::class);
    }

}
