<?php

/**
 * Created by Koss
 * Email: karakurtkoss{at}gmail.com
 * Date: 20.10.2014
 */

class Verse extends Eloquent
{
	/**
	 * @var string
	 */
	protected $table = 'verses';

	/**
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * @var array
	 */
	protected $fillable = [
		'name',
		'text'
	];

	/**
	 * @var array
	 */
	public static $validationRules = [
		'name' => 'required|min:3|max:50',
		'text' => 'required|min:3'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|User
	 */
	public function user() {
		return $this->belongsTo('User');
	}
} 