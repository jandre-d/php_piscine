<?php

include_once 'Color.class.php';

class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1;
	private $_color;

	public static $verbose = FALSE;

	public static function doc()
	{
		return @file_get_contents(get_class($this) . ".doc.txt");
	}

	public function get_x(){return ($this->_x);}
	public function set_x($value){$this->_x = (int)$value;}

	public function get_y(){return ($this->_y);}
	public function set_y($value){$this->_y = (int)$value;}

	public function get_z(){return ($this->_z);}
	public function set_z($value){$this->_z = (int)$value;}

	public function get_w(){return ($this->_w);}
	public function set_w($value){	$this->_w = (int)$value;}

	public function get_color(){return ($this->_color);}
	public function set_color(Color $new_color){$this->_color = $new_color;}

	function __construct(array $kwargs)
	{
		$this->_x = $kwargs['x'];
		$this->_y = $kwargs['y'];
		$this->_z = $kwargs['z'];

		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		else
			$this->_w = 1;

		if (array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));

		if (Vertex::$verbose == TRUE)
			echo $this->give_string(TRUE) . " constructed\n";
	}

	function __destruct()
	{
		if (Vertex::$verbose)
			echo $this->give_string(TRUE) . " destructed\n";
	}

	function __toString()
	{
		return $this->give_string(Vertex::$verbose);
	}

	private function give_string($with_color)
	{
		if ($with_color)
			return (sprintf("Vertex( x:%.2f, y:%.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color));
		else
			return (sprintf("Vertex( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

}