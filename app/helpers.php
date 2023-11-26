<?php

use App\Models\PasswordHistory;
use Illuminate\Support\Facades\Hash;

function isPasswordUsed($user_id, $password)
{
	return  PasswordHistory::where('user_id', $user_id)->orderBy('created_at', 'desc')
	->limit(10)
	->get()
	->filter(function ($history) use ($password) {
		return Hash::check($password, $history->password);
	})
	->isNotEmpty();
}

function addPasswordHistory($user_id, $password)
{
	if (isset($password)) {
		PasswordHistory::create([
			'user_id'  => $user_id,
			'password' => Hash::make($password),
		]);
	}
}
