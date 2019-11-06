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

$words = array();
$i = 1;
while ($i < $argc)
{
	$add = ft_split($argv[$i]);
	foreach ($add as $word)
		array_push($words, $word);
	$i++;
}
sort($words);
foreach ($words as $word)
{
	print("$word\n");
}
