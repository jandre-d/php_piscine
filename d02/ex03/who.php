#!/usr/bin/php
<?php

date_default_timezone_set("Europe/Amsterdam");
$fd = fopen("/var/run/utmpx", 'r');
while ($line = fread($fd, 628))
{
	$record = unpack(
		"a256Username/". 
		"i1TerminalID/". 
		"a32TerminalName/". 
		"i1PID/".
		"s1typeoflogin/".
		"a2unknown/".
		"i1Timestamp/".
		"iMicroseconds/".
		"a256Hostname"
		, $line);
	if ($record["TerminalID"] == 0 || $record["typeoflogin"] != 7)
		continue;
	$time = date("M  j H:i ", $record["Timestamp"]);
	echo trim($record["Username"]) . " " . trim($record["TerminalName"]) . "  " . $time . "\n";
	print($timme);
}
fclose($fd);
