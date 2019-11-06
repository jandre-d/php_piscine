#!/usr/bin/php
<?php

function ft_is_sort(array $arr)
{
	$compair_nor = $arr;
	$compair_rev = $arr;
	sort($compair_nor);
	rsort($compair_rev);
	if ($compair_nor === $arr || $compair_rev === $arr)
		return true;
	else
		return false;
}
