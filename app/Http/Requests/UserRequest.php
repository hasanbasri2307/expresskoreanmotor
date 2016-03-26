<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
		switch ($this->method()) {
			case 'POST':
				return [
					//
					'u_name' => 'required',
					'email' => 'required|email|unique:users,email',
					'password' => 'required',
					'status' => 'required'
				];
				break;

			case 'PUT':
				return [
					"u_name"=>"required",
					"status" => "required"
				];

				break;
		}

    }
}
