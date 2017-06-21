<?php
 namespace hostel\Models;

 use Illuminate\Database\Eloquent\Model;

 class Environment extends Model 
 {
 	protected $table = 'environment';

 	protected $fillable = ['name','simple_description','long_description','value'];

 	public function typeEnvironment()
 	{
 		$this->belongsTo('hostel\Models\TypeEnvironment');
 	}

 	public function scheduleRoom()
 	{
 		$this->hasMany('hostel\Models\ScheduleRoom');
 	}

 }