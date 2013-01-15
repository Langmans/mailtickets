<?php
// System Start Time
define('START_TIME', microtime(true));

// System Start Memory
define('START_MEMORY_USAGE', memory_get_usage());

// The current TLD address, scheme, and port
define('DOMAIN', (strtolower(getenv('HTTPS')) == 'on' ? 'https' : 'http') . '://' . getenv('HTTP_HOST') . (($p = getenv('SERVER_PORT')) != 80 AND $p != 443 ? ":$p" : ''));

// will hold if mod_rewrite is on.
define('MOD_REWRITE', (bool)$_SERVER['MOD_REWRITE']);

define('DS', '/');
define('PATH_SITE', realpath(__DIR__) . DS);
define('PATH_EXT', realpath(PATH_SITE . '../ext/') . DS);

// Is this an AJAX request?
define('AJAX_REQUEST', strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest');

// Get locale from user agent
$preference = 'nl_NL';
if (isset($_COOKIE['lang'])) {
	$preference = $_COOKIE['lang'];
}

setlocale(LC_ALL, $preference . '.utf-8', $preference, substr($preference, 0, 2));

// Default timezone of server
date_default_timezone_set('Europe/Amsterdam');

// iconv encoding
iconv_set_encoding("internal_encoding", "UTF-8");

// multibyte encoding
mb_internal_encoding('UTF-8');