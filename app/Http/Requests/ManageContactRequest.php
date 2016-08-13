<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class ManageContactRequest extends Request
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
        return [
            'first_name' => 'string|between:3,250',
            'last_name' => 'string|between:3,250',
            'email' => 'required|email',
            'phone' => 'string|between:3,250',
            'company_id' => 'exists:companies,id',
            'role' => 'string|between:3,250',
        ];
    }
}
