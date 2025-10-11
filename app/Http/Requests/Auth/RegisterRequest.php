<?php declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user.email' => 'required|email|unique:users,email',
            'user.password' => [
                'required',
                'confirmed'
            ],
            'user.password_confirmation' => 'required',
            'profile.username' => 'required|unique:user_profiles,username',
            'profile.first_name' => 'required',
            'profile.last_name' => 'required',
            'profile.middle_name' => 'nullable',
            'profile.birth_date' => 'required',
            'profile.gender' => 'required'
        ];
    }
}
