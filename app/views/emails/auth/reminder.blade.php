<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Восстановление пароля</h2>

		<p>
			Что бы восстановить пароль пройдите по {{ link_to_route('reset', 'этой ссылке', ['token' => $token]) }}.<br/>
			Ссылка действительна {{ Config::get('auth.reminder.expire', 60) }} минут.
		</p>
	</body>
</html>
