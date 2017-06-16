<?php

namespace hostel\Services\PagSeguro;

interface IPagSeguroService
{

	public function getURL();

	public function getRequestData();

	public function createLog();

	public function send();
}