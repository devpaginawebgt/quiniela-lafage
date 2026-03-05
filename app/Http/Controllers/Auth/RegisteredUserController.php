<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Codigo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterDoctorRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\LineService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
class RegisteredUserController extends Controller
{
    public function __construct(
        private readonly LineService $lineService
    ) {}
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $lines = $this->lineService->getLines();

        return view('auth.register', [
            'lines' => $lines
        ]);
    }

    public function createDoctor()
    {
        $lines = $this->lineService->getLines();

        return view('auth.register-doctor', [
            'lines' => $lines
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        
        $data['password'] = Hash::make($data['password']);

        $data['puntos'] = 0;

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        
    }
}