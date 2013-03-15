<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

	'driver'       => 'ORM',
	'hash_method'  => 'sha256',
	'hash_key'     => hash_hmac('sha256', 'Wiadomosc do zahashowania', 'xNfuovhZ$2462!B0eBnu^FCI2mZP#XcgLO5vILzJW!s2qQ8GAQ'),
	'lifetime'     => 1209600,
	'session_type' => Session::$default='database',
	'session_key'  => 'auth_user',

	// Username/password combinations for the Auth File driver
	'users' => array(
		// 'admin' => 'b3154acf3a344170077d11bdb5fff31532f679a1919e716a02',
	),

);
