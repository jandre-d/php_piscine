<?php

include_once('Lannister.class.php');

class Jaime extends Lannister
{
	public function sleepWith($x)
	{
		$sleepWith = get_class($x);

		switch ($sleepWith)
		{
			case 'Sansa':
				echo "Let's do this.\n";
				break;
			case 'Cersei':
				echo "With pleasure, but only in a tower in Winterfell, then.\n";
				break;
			default:
				echo "Not even if I'm drunk !\n";
		}
	}
}
