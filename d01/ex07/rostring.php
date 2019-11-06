#!/usr/bin/php
<?php

function ft_split($str)
{
	if (!is_string($str))
		return array();
	$line = preg_replace("( +)", " ", $str);
	$line = trim($line);
	$arr = array();
	if (strlen($line) == 0)
		return $arr;
	$arr = explode(' ', $line);
	return ($arr);
}

if ($argc > 1)
{
	$words = ft_split($argv[1]);
	$words[] = array_shift($words);
	foreach ($words as $word)
	{
		$result .= "$word ";
	}
	echo trim($result) . "\n";
}
