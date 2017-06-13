<?php

namespace hostel\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
	public function index() {
		return view('payment.index');
	}

}
