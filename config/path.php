<?php
$host = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'];
$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', $url);
$count = strlen($segments[1]);
$url_trim = substr($url, 0, (int)$count + 2);
$path = $host . $url_trim;

// for development
define('URL', $path);

// for hosting
//define('URL', $host . '/');
