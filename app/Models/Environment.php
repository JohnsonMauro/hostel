<?php
 namespace hostel\Models;

 use Illuminate\Database\Eloquent\Model;

 class Environment extends Model 
 {
 	protected $table = 'environment';

 	protected $fillable = ['name','simple_description','long_description','value'];

 	public function rooms()
    {
    	return $this->belongsToMany('hostel\Models\Room')->withPivot('active','version')->withTimestamps();
    }

 }