<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidate extends Authenticatable
{
	use Notifiable;

    protected $guarded = [];
    protected $guard = 'candidate';
    protected $table = "candidates";

    public function getAuthPassword()
    {
      return $this->password;
    }
}
