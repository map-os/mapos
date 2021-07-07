<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WarrantyStoreRequest extends FormRequest
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
        return [
            'date_warranty' => 'required|string|max:191',
            'ref_warranty' => 'required|string|max:10',
            'text_warranty' => 'required|string',
            'user_id' => 'required',
        ];
    }
}
