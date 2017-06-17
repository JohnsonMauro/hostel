<?php

namespace hostel\Http\Controllers;

use hostel\Services\PagSeguro\IPagSeguroService as IPagSeguroService;
use Illuminate\Http\Request;
use hostel\Models\Environment;

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

	public function submit($id) 
    {   
        $env = Environment::where(['id' => $id , 'active' => '1'])->get();
        $code = $this->service->send($env[0]);
	    return view('payment.success')->with('code', $code);
	}
}
