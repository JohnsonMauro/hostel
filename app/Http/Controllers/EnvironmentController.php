<?php

namespace hostel\Http\Controllers;

use hostel\Models\Environment;
use hostel\Models\TypeEnvironment;
use hostel\Models\Room;
use Illuminate\Support\Facades\DB;
use Request;

class EnvironmentController extends Controller {

	public function index() {
		
		$rooms = environment::where('active',1)->get();

		return view('environment.index', compact('rooms'));
	}

	public function show($id) {

		$room = environment::where('id', $id)->get();

		if(empty($room)) {
			return "Esse quarto não existe";
		}

		return view('environment.detail')->with('r',$room[0]);
	}

	public function add() {

		$rooms = Room::where('active',1)->get();
		return view('environment.add')->with('room',$rooms)->render();
	}

	public function save() {

		$room = $this->insertRoom();
		session()->flash('flash_message','Quarto inserido com sucesso');

		return redirect('/environment');
	}

	public function delete($id) {
		$this->deleteRoom($id);

		return redirect('/environment');		
	}

	public function prepareUpdate($id) {

		$room = Environment::find($id);
		$r = $room->rooms();
		dd($r);
		$rooms = Room::where('active',1)->get();
		return view('environment.update')->with('r', $room)->with('rooms', $rooms);
	}

	public function update() {
		$room = $this->getAllRequest();
		$version = $room['version'] += 1;
		$this->deleteRoom($room['id']);
		$this->insertRoom($room, $version);

		return redirect('/environment');

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
		$environment->value = $room['value'];
		$environment->qtd_adult = $room['qtd_adult'];
		$environment->qtd_children = $room['qtd_children'];
		$environment->qtd_bed = $room['qtd_bed'];

		return $environment;
	}

	private function insertRoom($version = 1) {
			
		$environment = $this->getEnvironmentRequest();
		$environment->created_at = $this->getDate();
		$environment->updated_at = $this->getDate();
		$environment->version = $version;
		$environment->active = 1;

		
		$environment->save();

		$request = Request::all();
		$environment->rooms()->attach($request['room_id']);

		
	}

	private function getDate() {
		return date('Y-m-d');
	}

	private function deleteRoom($id) {
		return DB::update('update environment set active = 0 where id = ?', [$id]);
	}
} 