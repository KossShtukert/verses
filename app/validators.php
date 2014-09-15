<?php
/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 12.09.2014
 */

Validator::extend(
	'latin_only', function ($attribute, $value) {
		return preg_match('/^[\pL\s]+$/u', $value);
	}
);