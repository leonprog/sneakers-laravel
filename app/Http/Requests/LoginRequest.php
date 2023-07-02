<?php

namespace App\Http\Requests;

use App\Facades\AuthFacade;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];

    }

    public function login()
    {
        return AuthFacade::login($this->validated());
    }
}
