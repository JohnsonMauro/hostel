<?php

namespace hostel\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['description', 'parent_id'];

    public function environments()
    {
    	return $this->belongsToMany('hostel\Models\Environment');
    }
}
