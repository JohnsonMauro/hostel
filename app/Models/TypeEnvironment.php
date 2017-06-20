<?php

namespace hostel\Models;

use Illuminate\Database\Eloquent\Model;

class TypeEnvironment extends Model
{
    protected $table = 'type_environment';

    protected $fillable = ['description','active','version'];

    public function environment()
    {
    	return $this->hasMany('hostel\Models\Environment');
    }
}
