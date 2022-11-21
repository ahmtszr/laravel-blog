<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display login page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * @var string
     *
     */

    protected function authenticated()
    {
        if (Auth::user()->role_as == '1') //Admin
        {
            return redirect('admin/dashboard')->with('status','Admin paneline hoşgeldiniz');
        }
        else if (Auth::user()->role_as == '0')//user
        {
            return redirect('/')->with('status','Giriş başarılı');
        }
        else

        return redirect('/');
    }
}
