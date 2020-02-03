<?php

include_once('IFighter.class.php');

class NightsWatch
{
	private $_rangers = array();

	public function recruit($someone)
	{
		if ($someone instanceof IFighter)
			$this->_rangers[] = $someone;
	} 

	public function fight()
	{
		foreach ($this->_rangers as $x)
		{
			$x->fight();
		}
	}

}