<?php

use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

/**
 * User
 * @property mixed nick_name
 * @property mixed password
 * @property mixed activationCode
 * @property mixed isActive
 * @property mixed id
 * @property mixed email
 * @property mixed first_name
 * @property mixed last_name
 */
class User extends Eloquent implements UserInterface, RemindableInterface
{

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'activationCode',
		'remember_token'
	];

	protected $fillable = [];

	protected $guarded = [
		'id',
		'email'
	];

	/**
	 * Validation SignIn rules
	 *
	 * @var array
	 */
	public static $signInRules = [
		'email'    => 'required|email|min:5|max:30',
		'password' => 'required|min:3|max:20'
	];

	/**
	 * Validation SignUp rules
	 *
	 * @var array
	 */
	public static $signUpRules = [
		'email'    => 'required|email|unique:users|min:5|max:30',
		'password' => 'required|confirmed|min:3|max:20'
	];

	/**
	 * Validation Profile rules
	 *
	 * @var array
	 */
	public static $profileRules = [
		'first_name' => 'required|min:3|max:20',
		'last_name'  => 'required|min:3|max:20',
		'nick_name'  => 'required|min:1|max:20|latin_only',
		'birthday'   => 'required|date',
		'gender'     => 'required|in:male,female',
		'password'   => 'required|confirmed|min:3|max:20'
	];

	/**
	 * @return mixed|static
	 */
	public function register() {
		$this->password       = Hash::make($this->password);
		$this->activationCode = $this->generateCode();
		$this->isActive       = false;
		$this->save();

		Log::info("User [{$this->email}] registered. Activation code: {$this->activationCode}");

		$this->sendActivationMail();

		return $this->id;
	}

	public function sendActivationMail() {
		$activationUrl = action('activate', [
			'userId'         => $this->id,
			'activationCode' => $this->activationCode,
		]);

		Mail::send('emails/auth/activation', ['activationUrl' => $activationUrl], function ($message) {
			$message->to($this->email)->subject('Спасибо за регистрацию');
		});
	}

	/**
	 * @param $activationCode
	 *
	 * @return bool
	 */
	public function activate($activationCode) {
		if ($this->isActive) {
			return false;
		}

		if ($activationCode != $this->activationCode) {
			return false;
		}

		$this->activationCode = '';
		$this->isActive       = true;
		$this->save();

		Log::info("User [{$this->email}] successfully activated");

		return true;
	}

	/**
	 * @param array $attributes
	 *
	 * @return bool|int
	 */
	public function update(array $attributes = array()) {
		if (isset($attributes['password'])) {
			$attributes['password'] = Hash::make($attributes['password']);
		}

		if (!$this->exists) {
			return $this->newQuery()->update($attributes);
		}

		return $this->fill($attributes)->save();
	}

	/**
	 * @return mixed|static
	 */
	public function name() {
		return $this->nick_name ?: $this->email;
	}

	/**
	 * @return string
	 */
	public function fullName() {
		return $this->first_name . ' ' . $this->last_name;
	}

	/**
	 * @return mixed
	 *
	 */
	public function getNicknameOrId() {
		return Str::lower($this->nick_name) ?: $this->id;
	}

	private function generateCode() {
		return Str::random();
	}
}
