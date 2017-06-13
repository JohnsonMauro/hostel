<?php
 namespace hostel\Models;

 use Illuminate\Database\Eloquent\Model;

 class Environment extends Model 
 {
 	protected $table = 'environment';

 	protected $fillable = ['name','simple_description','long_description','active','version'];
 }