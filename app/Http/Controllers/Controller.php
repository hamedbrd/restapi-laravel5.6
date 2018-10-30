<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    public $userId;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     *
     *
     * Controller constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->middleware(function ($request, $next) {

            $this->userId = \Auth::check() ? \Auth::User()->id : false;

            return $next($request);
        });
    }
}
