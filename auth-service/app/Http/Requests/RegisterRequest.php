<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends MainRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'user_name' => ['required','min:5','max:20','unique:users,user_name','regex:/^[a-z0-9_-]+$/'],
        'name' => ['required','string','min:3','max:55'],
        'email'=> ['required','email','unique:users,email'],
        'mobile'=> ['required','unique:users,mobile','min:11','max:11','regex:/^([0-9]*)$/'],
        'password'=> ['min:6','confirmed'],
        ];
    }
}
