<?php

namespace Hostel\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RoomController extends Controller {

	public function index() {

		$rooms = DB::select('select * from room where active = ?',[1]);


		return view('rooms/index')->withRooms($rooms);
	}
} 