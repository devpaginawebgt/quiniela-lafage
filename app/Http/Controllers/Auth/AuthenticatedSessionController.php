<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\UserService;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Lockout;

class AuthenticatedSessionController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    ) {}

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    public function createDoctor()
    {
        return view('auth.login-doctor');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $this->authenticate($request);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(LoginRequest $request)
    {
        $this->ensureIsNotRateLimited($request);        

        $data = $request->validated();
        
        if ((int)$data['user_type_id'] === 1) {

            $user = $this->userService->getLoginDependiente($request);

        } elseif ((int)$data['user_type_id'] === 2) {

            $user = $this->userService->getLoginDoctor($request);

        }

        if (empty($user)) {

            $error_message = '';

            switch($data['user_type_id']) {
                case 1:
                    $error_message = 'No se encontró un dependiente registrado con este número de documento.';
                    break;
                case 2:
                    $error_message = 'No se encontró un doctor registrado con este número de colegiado.';
                    break;
                default:
                    $error_message = 'No se encontró un usuario con este número de documento o colegiado.';
                    break;
            }

            throw ValidationException::withMessages([
                'identity' => $error_message,
            ]);

        }

        $credentials = ['email' => $user->email, 'password' => $data['password']];

        if (! Auth::attempt($credentials)) {
            RateLimiter::hit($this->throttleKey($request));

            throw ValidationException::withMessages([
                'identity' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey($request));
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(LoginRequest $request)
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 10)) {
            return;
        }

        event(new Lockout($request));

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'identity' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey($request)
    {
        return Str::lower($request->input('identity')).'|'.$request->ip();
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
