<?php

namespace hostel\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleRoom extends Model
{
	protected $table = "schedule_rooms";

	protected $fillable = ['users_id','environment_id','value','started_date','end_date'];

	public function environment()
	{
		$this->belongsTo('hostel\Models\Environment');
	}

	public function user()
	{
		$this->belongsTo('hostel\Models\User');
	}
}
