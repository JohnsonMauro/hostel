<?php

namespace hostel\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['description', 'parent_id'];

    public function children()
    {
    	return $this->hasMany('hostel\Models\Room', 'parent_id');
    }

    public function parent()
    {
    	return $this->belongsTo('hostel\Models\Room');
    }
}
