<?php

namespace Hostel\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class RoomController extends Controller {

	public function index() {

		$rooms = DB::select('select * from environment where active = ?',[1]);


		return view('rooms.index')->withRooms($rooms);
	}

	public function show($id) {

		$room = DB::select('select * from environment where id = ?', [$id]);

		if(empty($room)) {
			return "Esse quarto não existe";
		}

		return view('rooms.detail')->with('r',$room[0]);
	}

	public function add() {

		return view('rooms.add');
	}

	public function save() {

		$room = $this->getAllRequest();
		$success = $this->insertRoom($room);

		return redirect('/rooms');
	}

	public function delete($id) {

		return $this->index()->with('success', $this->deleteRoom($id));		
	}

	public function prepareUpdate($id) {

		$room = DB::select('select * from environment where id = ? and active = ?', [$id, 1]);

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

	private function insertRoom($room, $version = 1) {
		$success = DB::insert('insert into environment (name,simple_description,long_description, date_insert, version) values (?, ?, ?, ?, ?)', [$room['name'], $room['simpleDescription'], $room['longDescription'], $this->getDate(), $version]);
		return $success;
	}

	private function getDate() {
		return date('Y-m-d');
	}

	private function deleteRoom($id) {
		return DB::update('update environment set active = 0 where id = ?', [$id]);
	}
} 