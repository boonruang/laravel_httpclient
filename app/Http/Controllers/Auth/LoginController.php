<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\MarketAuthenticationService;
use App\Services\MarketService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * The service to authenticate actions.
     *
     * @var App\Services\MarketAuthenticationService;
     */
    protected $marketAuthenticationService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MarketAuthenticationService $marketAuthenticationService, MarketService $marketService)
    {
        $this->middleware('guest')->except('logout');

        $this->marketAuthenticationService = $marketAuthenticationService;

        parent::__construct($marketService);
    }

    /**
     * Show the appplication's login form.
     *
     * @return \Illuminate\Http\Response
     */
    
     
    public function showLoginForm() {

        $authorizationUrl = $this->marketAuthenticationService->resolveAuthorizationUrl();

        return view('auth.login')->with(['authorizationUrl' => $authorizationUrl]);
    }

    /**
     * Resolve the user authorization
     *
     * @return \Illuminate\Http\Response
     */

    public function authorization(Request $request) {
        if ($request->has('code')) {
            $tokenData = $this->marketAuthenticationService->getCodeToken($request->code);

            $userData = $this->marketService->getUserInformation();

            // dd($tokenData);
            dd($userData);
            
            return;
        }

        return redirect()->route('login')->withErrors(['You cancelled the authorization process']);
    }
}
