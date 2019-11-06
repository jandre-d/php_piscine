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
	sort($arr);
	return ($arr);
}
