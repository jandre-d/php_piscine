#!/usr/bin/php
<?php

if ($argc > 1)
{
	$html = file_get_contents($argv[1]);

	preg_match_all("/<img.*?src=\"(.*?)\".*?>/s", $html, $links);
	preg_match("/https?:\/\/([^\/]*)/", $argv[1], $foldername);
	mkdir($foldername[1], 0700);
	foreach ($links[1] as $link)
	{
		preg_match("/.*\/(.*?\..*)/", $link, $filename);
		echo $filename[1] . " => " . $link . "\n";
		if (preg_match("/^https?:\/\//", $link))
			file_put_contents($foldername[1] . "/" . $filename[1], file_get_contents($link));
		else
			file_put_contents($foldername[1] . "/" . $filename[1], file_get_contents($argv[1] . $link));
	}
}

?>
