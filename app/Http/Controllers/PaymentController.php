<?php

namespace hostel\Http\Controllers;

use hostel\Services\PagSeguro\IPagSeguroService as IPagSeguroService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    protected $service;


    public function __construct(IPagSeguroService $PagSeguroService)
    {
        $this->service = $PagSeguroService;
    }

	public function index() 
    {
		return view('payment.index');
	}

	public function submit() 
    {
        $code = $this->service->send();
	    return view('payment.success')->with('code', $code);
	}
}
