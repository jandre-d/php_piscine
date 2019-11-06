#!/usr/bin/php
<?php

do
{
	echo 'Enter a number: ';
	$line = fgets(STDIN);
	if (!$line)
		exit ("^D\n");
	$line = str_replace("\n", '', $line);
	if (is_numeric($line))
	{
		if ($line % 2 == 0)
			echo "The number $line is even\n";
		else
			echo "The number $line is odd\n";
	}
	else
		echo "'$line' is not a number\n";
}	while (1);
