#!/usr/bin/php
<?php

if ($argc < 2)
	exit;
$input = file_get_contents($argv[1]);
$result = preg_replace_callback('/<a.*?>.*?<\/a>/s', function($match) {
	$match[0] = preg_replace_callback('/(.*?title=")(.*?)/s', function($submatch) {
		return ($submatch[1] . strtoupper($submatch[2]) . '"'); }, $match[0]);
	$match[0] = preg_replace_callback('/(.*?>)(.*?)</s', function($submatch) {
		return ($submatch[1] . strtoupper($submatch[2]) . '<'); }, $match[0]);
	return ($match[0]);
}, $input);
echo $result;
