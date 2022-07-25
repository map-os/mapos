<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->user ? $this->user->id : auth()->user()->id;

        return [
            'name' => 'required|string|min:5',
            'email' => 'required|string|email|unique:users,email,'.$id.',id',
            'password' => 'sometimes|string|confirmed|min:8|nullable',
        ];
    }
}
