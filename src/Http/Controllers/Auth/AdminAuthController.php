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

    protected $redirectTo = '/admin/dashboard';
    protected $loginPath = '/admin/auth/login';
    protected $redirectAfterLogout = '/admin/auth/login';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
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

        $this->middleware('guest', ['except' => 'getLogout']);
    }

}
