<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class CreateContactRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first_name' => 'between:3,250',
            'last_name' => 'between:3,250',
            'email' => 'required|email',
            'phone' => 'between:3,250',
            'company_id' => 'exists:company,id',
            'position' => 'between:3,250',
        ];

        return $rules;
    }
}
