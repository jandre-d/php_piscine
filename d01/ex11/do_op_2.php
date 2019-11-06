#!/usr/bin/php
<?php

if ($argc != 2)
	exit ("Incorrect Parameters\n");
if (!preg_match("@^(?:\s*)(\d+)(?:\s*)([+\-*\/%])(?:\s*)(\d+)(?:\s*)$@", $argv[1]))
	exit ("Syntax Error\n");

eval("echo ".$argv[1].";");
echo "\n";
