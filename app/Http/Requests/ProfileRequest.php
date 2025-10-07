<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|max:60',
            'email' => 'required|email|max:255',
            'profession' => 'nullable|max:60',
            'about' => 'nullable|max:255',
            'photo' => 'nullable|image|max:2048',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
        ];
    }
}
