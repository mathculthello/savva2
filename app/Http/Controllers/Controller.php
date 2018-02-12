<?php

namespace Savva\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Exception;

use Savva\Url;

class Controller extends BaseController
{


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


}
