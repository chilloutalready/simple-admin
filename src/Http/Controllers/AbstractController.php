<?php namespace Chilloutalready\SimpleAdmin\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class AbstractController extends BaseController {

    use DispatchesCommands, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(SApackageConfig('adminAuthMiddleware'));
    }

}
