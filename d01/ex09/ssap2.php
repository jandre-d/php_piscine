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

function cmp($a, $b)
{
	$order_str = 'abcdefghijklmnopqrstuvwxyz0123456789 !"#$%&\'()*+,-./:;<=>?@[\]^_`{|}~';
	$a = strtolower($a);
	$b = strtolower($b);
	$i = 0;

	while ($a[$i] == $b[$i] && $a[$i] && $b[$i])
		$i++;

	if ($a[$i] !== 0 && $b[$i] !== 0)
	{
		$x = strpos($order_str, strtolower($a)[$i]);
		$y = strpos($order_str, strtolower($b)[$i]);
		if ($x == $y)
			return (0);
		return ($x - $y);
	}
	else
	{
		if (!$a[$i] && !$b[$i])
			return (0);
		if (!$a[$i])
			return (-1);
		if (!$b[$i])
			return (1);
	}
}

$words = array();
$i = 1;
while ($i < $argc)
{
	$add = ft_split($argv[$i]);
	foreach ($add as $word)
		array_push($words, $word);
	$i++;
}

usort($words, "cmp");

foreach ($words as $word)
{
	print("$word\n");
}
