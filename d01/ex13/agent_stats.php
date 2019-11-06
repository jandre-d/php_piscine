#!/usr/bin/php
<?php

if ($argc == 1)
	exit();

$input = file("php://stdin");

foreach ($input as $value)
{
	$splitted = explode(';', $value);
	$grade["feedback"] = $splitted[3];
	$grade["evaluator"] = $splitted[2];
	$grade["score"] = $splitted[1];
	if ($grade["score"] === "" || $grade["score"] === "Note")
		continue;
	$grades[$splitted[0]][] = $grade;
}

if ($argv[1] == 'average' || $argv[1] == 'moyenne')
{
	$grade_total = 0;
	$grade_count = 0;
	foreach ($grades as $user)
	{
		foreach ($user as $grade)
		{
			if ($grade["evaluator"] == 'moulinette')
				continue;
			$grade_total += $grade["score"];
			$grade_count++;
		}
	}
	echo $grade_total / $grade_count;
	echo "\n";
}

if ($argv[1] == 'average_user' || $argv[1] == 'moyenne_user')
{
	ksort($grades);
	foreach ($grades as $key => $user)
	{
		$usr_grade_total = 0;
		$usr_grade_count = 0;
		foreach ($user as $grade)
		{
			if ($grade["evaluator"] == 'moulinette')
				continue;
			$usr_grade_total += $grade["score"];
			$usr_grade_count++;
		}
		echo "$key:";
		echo $usr_grade_total / $usr_grade_count;
		echo "\n";
	}
}

if ($argv[1] == 'moulinette_variance' || $argv[1] == 'ecart_moulinette')
{
	ksort($grades);
	foreach ($grades as $key => $user)
	{
		$usr_grade_total = 0;
		$usr_grade_count = 0;
		$moulinette_grade_total = 0;
		$moulinette_grade_count = 0;
		foreach ($user as $grade)
		{
			if ($grade["evaluator"] == 'moulinette')
			{
				$moulinette_grade_total += $grade["score"];
				$moulinette_grade_count++;
			}
			else
			{
				$usr_grade_total += $grade["score"];
				$usr_grade_count++;
			}
		}
		$usr_avrg = $usr_grade_total / $usr_grade_count;
		$moul_avrg = $moulinette_grade_total / $moulinette_grade_count;
		echo "$key:";
		echo $usr_avrg - $moul_avrg;
		echo "\n";
	}
}
