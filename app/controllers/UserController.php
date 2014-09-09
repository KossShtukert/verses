<?php

/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 08.09.2014
 */
class UserController extends BaseController
{
	public function getProfile(User $user) {
		$this->setContent(View::make('profile.index', compact('user')));
	}

	public function postProfile() {

	}

	public function getVerses() {
		die(var_dump(__LINE__));
	}
} 