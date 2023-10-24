<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
	public function index(): JsonResponse
	{
		return response()->json(
			[
				'message' => __('validation.auth_successfully'),
				'user'    => new UserResource(auth()->user()),
			],
			200
		);
	}
}
