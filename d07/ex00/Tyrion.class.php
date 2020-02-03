<?php

class Tyrion extends Lannister
{
	function __construct()
	{
		parent::__construct();
		echo "My name is Tyrion\n";
	}

	function getSize()
	{
		return 'Short';
	}
}
