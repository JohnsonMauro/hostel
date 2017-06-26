<?php

namespace hostel\Http\Controllers;

use hostel\Models\Room;
use Request;

class RoomController extends Controller
{
    public function index()
    {
    	return view('room.index');
    }

    public function add()
    {
        Room::create(Request::all());
    	session()->flash('flash_message','Cômodo inserido com sucesso');
    	session()->flash('menu', '2');
    	session()->flash('url', '/room');
    	return redirect('/');
    }

    public function save()
    {
    	
    }
}
