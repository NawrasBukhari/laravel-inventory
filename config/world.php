<?php

return [
	/*------------------------------------------------- /
	Default dialling country code.
	Used when the default dialling argument is not passed
	to the helper methods.
	/ ------------------------------------------------ */
	'default_phone_code' => '40',
	'accepted_locales' => [
		'en',
		'ru',
	],
	'modules' => [
		'states' => true,
		'cities' => true,
		'timezones' => true,
		'currencies' => true,
		'languages' => true,
	],
];
