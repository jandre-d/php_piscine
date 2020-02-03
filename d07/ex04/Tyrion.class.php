<?php

include_once('Lannister.class.php');

class Tyrion extends Lannister
{
	public function sleepWith($x)
	{
		$sleepWith = get_class($x);

		switch ($sleepWith)
		{
			case 'Sansa':
				echo "Let's do this.\n";
				break;
			default:
				echo "Not even if I'm drunk !\n";
		}
	}
}
