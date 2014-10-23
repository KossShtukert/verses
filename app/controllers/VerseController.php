<?php

class VerseController extends BaseController
{
	/**
	 * @param User $user
	 */
	public function getUserVerses(User $user) {
		$verses = $user->verses()->paginate();

		$this->setContent(View::make('profile.verse.index', compact('user', 'verses')));
	}

	/**
	 * @param User $user
	 */
	public function create(User $user) {
		if (Request::isMethod('POST')) {
			$validationRules = Verse::$validationRules;

			$validator = Validator::make(Input::all(), $validationRules);

			if ($validator->fails()) {
				return Redirect::back()->withInput()->withErrors($validator);
			}

			if ($verse = $user->verses()->create(Input::all())) {
				return Redirect::route('profile_verses', $user->getNicknameOrId())->withSuccess('Стих успешно создан');
			}

			return Redirect::route('profile_verses', $user->getNicknameOrId())->withError('Ошибка создания стиха');
		} else {
			$this->setContent(View::make('profile.verse.edit', compact('user')));
		}
	}

	public function edit($id) {
		//
	}

	public function delete($id) {
		//
	}

	public function restore($id) {
		//
	}
}