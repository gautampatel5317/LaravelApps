<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
		  'category_id' => 'required',
          'service_name' => 'required',
          'description' => 'required',
          'Start_date' => 'required',
          'end_date' => 'required'
		];
	}

    /**
     *
     * Custom Validation Message
     */
    public function messages() {
        return [
            
        ];
    }
}
