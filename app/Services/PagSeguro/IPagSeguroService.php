<?php

namespace hostel\Services\PagSeguro;

interface IPagSeguroService
{

	public function getURL();

	public function createLog();

	public function send($req);
}