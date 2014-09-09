<?php
/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 09.09.2014
 */
Route::bind(
	'user', function ($idOrName) {
		if (is_numeric($idOrName)) {
			$user = User::findOrFail($idOrName);
		} else {
			$user = User::whereNickName($idOrName)->firstOrFail();
		}

		return $user;
	}
);