<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect to login page.
     *
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('auth.login');
    }

    /**
     * Login page.
     *
     * @return View
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user and redirect to dashboard if ok, and to logout
     * if not.
     *
     * @param \App\Http\Requests\Admin\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate (LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['is_active'] = true;

        /**
         * This works. If code editor accuse that some method dont exists, dont believe!
         */
        $result = Auth::guard('web')->attempt($validated);

        if (!$result) {
            return redirect()->route('auth.login')
                             ->with(
                                'danger',
                                'Wrong user or password.'
                            );
        }

        return redirect()->route('profile')
                         ->with(
                            'success',
                            'You are logged.'
                        );
    }

    public function register() {
        return view('auth.register');
    }

    public function store (RegisterRequest $request) {

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login')
                        ->with(
                            'success',
                            'You are logged out.'
                        );
    }
}
