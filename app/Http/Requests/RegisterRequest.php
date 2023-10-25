<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'username'       => 'required|min:3|max:255|unique:users,username',
			'email'          => 'required|email|max:255|unique:users,email',
			'password'       => 'required|min:3|max:255',
			'repeat_password'=> 'required|same:password',
		];
	}

	/**
	 * Get custom attributes for validation.
	 *
	 * @return array
	 */
	public function attributes()
	{
		return [
			'username' => __('attributes.username'),
			'email'    => __('attributes.email'),
		];
	}
}
