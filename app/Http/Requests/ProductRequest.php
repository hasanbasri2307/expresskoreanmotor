<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
					"p_name" => "required",
					"price" => "required|numeric",
					"description" => "required",
					"is_available" => "required",
					"is_show" => "required",
					"cat_id" => "required",
					'picture.*' => 'required|image|mimes:jpg,jpeg,png|max:1024'

				];
				break;

			case 'PUT':
				return [
					//
					"p_name" => "required",
					"price" => "required|numeric",
					"description" => "required",
					"is_available" => "required",
					"is_show" => "required",
					"cat_id" => "required",
					'picture.*' => 'image|mimes:jpg,jpeg,png|max:1024'
				];

				break;
		}

    }
}
