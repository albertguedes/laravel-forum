<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Models\UserProfile;

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

    /**
     * Register a new user.
     *
     * @param \App\Http\Requests\Auth\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store (RegisterRequest $request)
    {
        $validated = $request->validated();
// JGZHa-qd9pE"E2X
        try {
            DB::beginTransaction();

            $userData = $validated['user'];
            $userData['password'] = Hash::make($userData['password']);
            $userData['remember_token'] = Str::random(10);

            $user = User::create($userData);

            $profileData = $validated['profile'];
            $profileData['user_id'] = $user->id;

            UserProfile::create($profileData);

            DB::commit();

            return redirect()
                    ->route('auth.login')
                    ->with('success', 'You are registered.');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()
                    ->route('auth.register')
                    ->with('danger', 'Registration failed: ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('auth.login')
                         ->with('success', 'You are logged out.');
    }
}
