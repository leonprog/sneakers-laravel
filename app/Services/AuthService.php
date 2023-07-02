<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthService
{
    public function create(array $data): Model|\Illuminate\Database\Eloquent\Builder
    {
        $data['password'] = Hash::make($data['password']);

        return User::query()->create($data);
    }

    public function login(array $data): RedirectResponse
    {
        if (Auth::attempt($data)) {
            return $this->home();
        }

        return back()->withErrors(
            ['incorrect' => __("exceptions.invalid_credentials")]
        );
    }

    public function redirect($provider): RedirectResponse
    {
        $allowedProviders = ['yandex', 'google'];

        if (in_array($provider, $allowedProviders)) {
            return Socialite::driver($provider)->redirect();
        }
        return abort(404);
    }

    public function handleCallback($provider): RedirectResponse
    {
        $user = Socialite::driver($provider)->user();
        $isUser = User::query()->where("{$provider}_id", $user->id)->first();

        if ($isUser) {
            Auth::login($isUser);
        } else {
            $user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                "{$provider}_id" => $user->id,
                'password' => Hash::make(Str::random(32))
            ]);
            Auth::login($user);
        }
        return $this->home();
    }

    public function home(): RedirectResponse
    {
        return redirect()->route('home');
    }
}
