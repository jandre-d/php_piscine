<?php

class UnholyFactory
{
	private $_fighters = array();

	private function contains($type)
	{
		foreach ($this->_fighters as $fighter)
		{
			if ($fighter->fighter_type == $type)
				return ($fighter);
		}
		return (FALSE);
	}

	public function absorb($x)
	{
		if ($x->fighter_type != '')
		{
			if ($this->contains($x->fighter_type) === FALSE)
			{
				$this->_fighters[] = $x;
				echo "(Factory absorbed a fighter of type $x->fighter_type)\n";
			}
			else
			{
				echo "(Factory already absorbed a fighter of type $x->fighter_type)\n";
			}
		}
		else
		{
			echo "(Factory can't absorb this, it's not a fighter)\n";
		}
	}

	public function fabricate($type)
	{
		$clone_me = $this->contains($type);

		if ($clone_me !== FALSE)
		{
			echo "(Factory fabricates a fighter of type $type)\n";
			return (clone $clone_me);
		}
		else
		{
			echo "(Factory hasn't absorbed any fighter of type $type)\n";
		}
	}

}
