<?php

/**
 * Created by Koss
 * Email: karakurtkoss{at}gmail.com
 * Date: 08.09.2014
 */
class UserController extends BaseController
{
	/**
	 * @param User $user
	 */
	public function getProfile(User $user) {
		$this->setContent(View::make('profile.index', compact('user')));
	}

	/**
	 * @param User $user
	 *
	 * @return $this
	 */
	public function postProfile(User $user) {
		$validationRules = User::$profileRules;

		if (!$password = Input::get('password')) {
			unset($validationRules['password']);
			$inputs = Input::except('_token', 'password', 'password_confirmation');
		} else {
			$inputs = Input::except('_token', 'password_confirmation');
		}

		$validator = Validator::make(Input::all(), $validationRules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		if ($user->update($inputs)) {
			return Redirect::route('profile', $user->getNicknameOrId())->withSuccess('Профайл успешно обновлен');
		}

		return Redirect::route('profile', $user->getNicknameOrId())->withError('Ошибка обновления профайла');
	}

	/**
	 * @param User $user
	 */
	public function getVerses(User $user) {
		$verses = $user->verses()->paginate();

		$this->setContent(View::make('profile.verses.index', compact('user', 'verses')));
	}

	/**
	 * @param User $user
	 */
	public function getCreateVerses(User $user) {
		$this->setContent(View::make('profile.verses.create', compact('user')));
	}

	/**
	 * @param User $user
	 *
	 * @return $this
	 */
	public function postCreateVerses(User $user) {
		$validationRules = Verse::$validationRules;

		$validator = Validator::make(Input::all(), $validationRules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		if ($verse = $user->verses()->create(Input::all())) {
			return Redirect::route('profile_verses', $user->getNicknameOrId())->withSuccess('Стих успешно создан');
		}

		return Redirect::route('profile_verses', $user->getNicknameOrId())->withError('Ошибка создания стиха');
	}
} 