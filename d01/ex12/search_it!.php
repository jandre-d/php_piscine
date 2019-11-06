#!/usr/bin/php
<?php

if ($argc <= 2)
	exit ();
$i = 2;
while ($i < $argc)
{
	$in = explode(':', $argv[$i]);
	$res[$in[0]] = $in[1];
	$i++;
}
if (array_key_exists($argv[1], $res))
{
	echo $res[$argv[1]];
	echo "\n";
}
