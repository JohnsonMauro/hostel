<?php

namespace hostel\Http\Controllers;

use hostel\Models\Environment;
use hostel\Models\TypeEnvironment;
use Illuminate\Support\Facades\DB;
use Request;

class RoomController extends Controller {

	public function index() {
		
		$rooms = environment::where('active',1)->get();

		return view('rooms.index')->withRooms($rooms);
	}

	public function show($id) {

		$room = environment::where('id', $id)->get();

		if(empty($room)) {
			return "Esse quarto não existe";
		}

		return view('rooms.detail')->with('r',$room[0]);
	}

	public function add() {

		$types = TypeEnvironment::where('active',1)->pluck('description','id');
		return view('rooms.add')->with('types',$types);
	}

	public function save() {

		$room = $this->getAllRequest();
		$success = $this->insertRoom($room);

		return redirect('/rooms');
	}

	public function delete($id) {
		$this->deleteRoom($id);

		return redirect('/rooms');		
	}

	public function prepareUpdate($id) {

		$room = environment::where(['id' => $id, 'active' => '1' ])->get();

		return view('rooms.update')->with('r', $room[0]);
	}

	public function update() {
		$room = $this->getAllRequest();
		$version = $room['version'] += 1;
		$this->deleteRoom($room['id']);
		$this->insertRoom($room, $version);

		return redirect('/rooms');

	}

	private function getAllRequest() {
		return Request::all();
	}

	private function getEnvironmentRequest() {
		$room = Request::all();

		$environment = new Environment;
		$environment->name = $room['name'];
		$environment->simple_description = $room['simpleDescription'];
		$environment->long_description = $room['longDescription'];
		$environment->type_environment_id = $room['types'];
		$environment->value = $room['value'];

		return $environment;
	}

	private function insertRoom($room, $version = 1) {
			
		$environment = $this->getEnvironmentRequest();
		$environment->created_at = $this->getDate();
		$environment->updated_at = $this->getDate();
		$environment->version = $version;
		$environment->active = 1;

		
		return $environment->save();

		
	}

	private function getDate() {
		return date('Y-m-d');
	}

	private function deleteRoom($id) {
		return DB::update('update environment set active = 0 where id = ?', [$id]);
	}
} 