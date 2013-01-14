<?php
// System Start Time
define('START_TIME', microtime(true));

// System Start Memory
define('START_MEMORY_USAGE', memory_get_usage());

// Directory separator (Unix-Style works on all OS)
define('DS', '/');

// Absolute path to the system folder
define('SP', realpath(__DIR__). DS);

// Is this an AJAX request?
define('AJAX_REQUEST', strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest');

// The current TLD address, scheme, and port
define('DOMAIN', (strtolower(getenv('HTTPS')) == 'on' ? 'https' : 'http') . '://'
		. getenv('HTTP_HOST') . (($p = getenv('SERVER_PORT')) != 80 AND $p != 443 ? ":$p" : ''));

// The current site path
define('PATH', parse_url(getenv('REQUEST_URI'), PHP_URL_PATH));

// Get locale from user agent
$preference = 'nl_NL';
if(isset($_COOKIE['lang']))
{
	$preference = $_COOKIE['lang'];
}

setlocale(LC_ALL, $preference . '.utf-8', $preference, substr($preference, 0, 2));

// Default timezone of server
date_default_timezone_set('Europe/Amsterdam');

// iconv encoding
iconv_set_encoding("internal_encoding", "UTF-8");

// multibyte encoding
mb_internal_encoding('UTF-8');