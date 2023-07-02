<?php

namespace App\Http\Controllers;

use App\Facades\AuthFacade;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\SocialRedirectRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function registration(RegistrationRequest $request): RedirectResponse
    {
        $user = $request->createAccount();

        Auth::login($user);

        return AuthFacade::home();
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        return $request->login();
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return AuthFacade::home();
    }

    public function redirect($provider)
    {
        return AuthFacade::redirect($provider);
    }

    public function handleCallback($provider)
    {
        return AuthFacade::handleCallback($provider);
    }
}
