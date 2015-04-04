<?php namespace Chilloutalready\SimpleAdmin\Http\Controllers\Auth;

use Chilloutalready\SimpleAdmin\Auth\AdminAuthManager;
//use Illuminate\Contracts\Auth\Guard;
use Chilloutalready\SimpleAdmin\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Chilloutalready\SimpleAdmin\Auth\Foundation\AuthenticatesAndRegistersAdmins;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class AdminAuthController extends Controller {

    
    use DispatchesCommands, ValidatesRequests, AuthenticatesAndRegistersAdmins;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;
        $prefix = SApackageConfig('prefix');

        $this->redirectTo = '/' . $prefix . '/dashboard';
        $this->loginPath  = '/' . $prefix . '/auth/login';
        $this->redirectAfterLogout = '/' . $prefix . '/auth/login';

        $this->middleware('guest', ['except' => 'getLogout']);
    }

}
