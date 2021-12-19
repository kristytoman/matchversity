<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Return the form for admin login.
     *
     * @return View
     */
    public function showAdmin(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function adminLogin(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], (boolean)$request->get('remember'))) {
            return redirect()->route('admin.mobilities.index');
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Return the form for user login.
     *
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // Fake authentication
        if ($credentials['email'] == 'test@utb.cz' && $credentials['password'] == '1234') {
            $user = User::find(353);// TODO:change
            if ($user instanceof User) {
                Auth::login($user);
                return redirect()->intended();
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
