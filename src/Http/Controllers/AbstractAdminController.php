<?php namespace Chilloutalready\SimpleAdmin\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class AbstractAdminController extends BaseController {

    use DispatchesCommands, ValidatesRequests;

    public function __construct()
    {
        //run the config defined middleware
        $this->middleware(SApackageConfig('adminAuthMiddleware'));
    }

}
