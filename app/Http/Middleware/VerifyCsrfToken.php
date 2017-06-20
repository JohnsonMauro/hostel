<?php

namespace hostel\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{

		protected function tokensMatch($request)
		{
			if($request->wantsJson())
			{
				return true;
			}
			return parent::tokensMatch($request);
		}

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
