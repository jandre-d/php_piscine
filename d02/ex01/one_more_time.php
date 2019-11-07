#!/usr/bin/php
<?php

date_default_timezone_set("Europe/Paris");
if ($argc > 1)
{
	$input = $argv[1];
	if (preg_match(
	"/([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)" .
	" " .
	"([0-9]{1}|[0-9]{2})" .
	" " .
	"([Jj]anvier|[Ff]évrier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ei|[Jj]uin|[Jj]uillet|[Aa]oût|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]écembre|[Dd]ecembre)" .
	" " .
	"[0-9]{4}" .
	" " .
	"(24:00:00|" .
	"([0-1][0-9]|[2][0-3]):[0-5][0-9]:[0-5][0-9])/", $input) != 1)
		exit ("Wrong Format\n");
	$timestamp = 0;
	$fields = preg_split("/ /", $input);
	$day_nbr = 0;
	if (preg_match("/[Ll]undi/", $fields[0]))
		$day_nbr = 1;
	elseif (preg_match("/[Mm]ardi/", $fields[0]))
		$day_nbr = 2;
	elseif (preg_match("/[Mm]ercredi/", $fields[0]))
		$day_nbr = 3;
	elseif (preg_match("/[Jj]eudi/", $fields[0]))
		$day_nbr = 4;
	elseif (preg_match("/[Vv]endredi/", $fields[0]))
		$day_nbr = 5;
	elseif (preg_match("/[Ss]amedi/", $fields[0]))
		$day_nbr = 6;
	elseif (preg_match("/Dd]imanche/", $fields[0]))
		$day_nbr = 7;
	$month_nbr = 0;
	if (preg_match("/[Jj]anvier/", $fields[2]))
		$month_nbr = 1;
	elseif (preg_match("/[Ff]évrier|[Ff]evrier/", $fields[2]))
		$month_nbr = 2;
	elseif (preg_match("/[Mm]ars/", $fields[2]))
		$month_nbr = 3;
	elseif (preg_match("/[Aa]vril/", $fields[2]))
		$month_nbr = 4;
	elseif (preg_match("/[Mm]ei/", $fields[2]))
		$month_nbr = 5;
	elseif (preg_match("/[Jj]uin/", $fields[2]))
		$month_nbr = 6;
	elseif (preg_match("/[Jj]uillet/", $fields[2]))
		$month_nbr = 7;
	elseif (preg_match("/[Aa]oût|[Aa]out/", $fields[2]))
		$month_nbr = 8;
	elseif (preg_match("/[Ss]eptembre/", $fields[2]))
		$month_nbr = 9;
	elseif (preg_match("/[Oo]ctobre/", $fields[2]))
		$month_nbr = 10;
	elseif (preg_match("/[Nn]ovembre/", $fields[2]))
		$month_nbr = 11;
	elseif (preg_match("/[Dd]écembre|[Dd]ecembre/", $fields[2]))
		$month_nbr = 11;
	$time_fields = preg_split("/:/", $fields[4]);
	echo mktime($time_fields[0], $time_fields[1], $time_fields[2], $month_nbr, $day_nbr, $fields[3]) . "\n";
}
