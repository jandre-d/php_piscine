#!/usr/bin/php
<?php

if ($argc == 2) {
	echo preg_replace("( +)", " ", trim($argv[1]));
	echo "\n";
}
