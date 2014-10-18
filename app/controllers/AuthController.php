<?php

/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 04.09.2014
 */
class AuthController extends BaseController
{
	public function getSignIn() {
		$this->setContent(View::make('auth.signin'));
	}

	public function postSignIn() {
		$validator = Validator::make(Input::all(), User::$signInRules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$credentials = [
			'email'    => Input::get('email'),
			'password' => Input::get('password'),
			'isActive' => 1,
		];

		if (Auth::attempt($credentials, Input::has('remember'))) {
			Log::info('User [' . $credentials['email'] . '] successfully logged in.');

			return Redirect::intended()->withSuccess('Рады видеть Вас ' . Auth::getUser()->name() . '!');
		} else {
			Log::info('User [' . $credentials['email'] . '] failed to login.');
		}

		return Redirect::back()
					   ->withError('Неверная комбинация email или пароля, либо учетная запись еще не активирована');
	}

	public function getSignUp() {
		$this->setContent(View::make('auth.signup'));
	}

	public function postSignUp() {
		$validator = Validator::make(Input::all(), User::$signUpRules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = new User();
		$user->fill(Input::all())->register();

		return Redirect::route('home')
					   ->withInfo('Регистрация почти завершена. Вам необходимо подтвердить e-mail, указанный при регистрации, перейдя по ссылке в письме');
	}

	public function getLogout() {
		Auth::logout();

		return Redirect::route('home')->withSuccess('До скорых встречь!');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getActivate() {
		$userId         = Input::get('userId');
		$activationCode = Input::get('activationCode');

		$user = User::find($userId);

		if (!$user) {
			return Redirect::route('home')->withError('Неверная ссылка на активацию аккаунта');
		}

		if ($user->activate($activationCode)) {
			Auth::login($user);

			return Redirect::route('profile', $user->getNicknameOrId())->withSuccess('Аккаунт активирован');
		}

		return Redirect::route('home')
					   ->withError('Неверная ссылка на активацию аккаунта, либо учетная запись уже активирована');
	}
} 