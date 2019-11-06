#!/usr/bin/php
<?php

if ($argc != 4)

	exit ("Incorrect Parameters");

	$nbr_1 = trim($argv[1], " \t");
	$op = trim($argv[2], " \t");
	$nbr_2 = trim($argv[3], " \t");

	switch ($op)
	{
		case '+':
			print($nbr_1 + $nbr_2);
			print("\n");
			break ;
		case '-':
			print($nbr_1 - $nbr_2);
			print("\n");
			break ;
		case '*':
			print($nbr_1 * $nbr_2);
			print("\n");
			break ;
		case '/':
			print($nbr_1 / $nbr_2);
			print("\n");
			break ;
		case '%':
			print($nbr_1 % $nbr_2);
			print("\n");
			break ;
	}
