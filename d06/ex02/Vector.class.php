<?php

include_once 'Vertex.class.php';

class Vector
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;

	public static $verbose = false;

	public function get_x(){return ($this->_x);}
	public function get_y(){return ($this->_y);}
	public function get_z(){return ($this->_z);}
	public function get_w(){return ($this->_w);}

	public static function doc()
	{
		return @file_get_contents(get_class($this) . ".doc.txt");
	}

	public function __construct(array $kwargs)
	{
		$dest = $kwargs['dest'];
		if (array_key_exists('orig', $kwargs))
		{
			$orig = $kwargs['orig'];
			$this->_x = $dest->get_x() - $orig->get_x();
			$this->_y = $dest->get_y() - $orig->get_y();
			$this->_z = $dest->get_z() - $orig->get_z();
		}
		else
		{
			$this->_x = $dest->get_x();
			$this->_y = $dest->get_y();
			$this->_z = $dest->get_z();
		}
		if (Vector::$verbose)
		{
			echo $this .  " constructed\n";
		}
	}

	public function __destruct()
	{
		if (Vector::$verbose)
		{
			echo $this .  " destructed\n";
		}
	}

	public function __toString()
	{
		return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function magnitude()
	{
		return (sqrt(
			$this->_x * $this->_x +
			$this->_y * $this->_y +
			$this->_z * $this->_z));
	}

	public function normalize()
	{
		$mag = $this->magnitude();
		if ($mag == 1)
			return (clone $this);
		return (new Vector(array(
			'dest' => new Vertex(array(
				'x' => $this->_x / $mag,
				'y' => $this->_y / $mag,
				'z' => $this->_z / $mag)))));
	}

	public function add(Vector $rhs)
	{
		return (new Vector(array(
			'dest' => new Vertex(array(
				'x' => $this->_x + $rhs->get_x(),
				'y' => $this->_y + $rhs->get_y(),
				'z' => $this->_z + $rhs->get_z())))));
	}

	public function sub(Vector $rhs)
	{
		return (new Vector(array(
			'dest' => new Vertex(array(
				'x' => $this->_x - $rhs->get_x(),
				'y' => $this->_y - $rhs->get_y(),
				'z' => $this->_z - $rhs->get_z())))));
	}

	public function opposite()
	{
		return (new Vector(array(
			'dest' => new Vertex(array(
				'x' => $this->_x * -1,
				'y' => $this->_y * -1,
				'z' => $this->_z * -1)))));
	}

	public function scalarProduct($k)
	{
		return (new Vector(array(
			'dest' => new Vertex(array(
				'x' => $this->_x * $k,
				'y' => $this->_y * $k,
				'z' => $this->_z * $k)))));
	}

	public function dotProduct(Vector $rhs)
	{
		return (float)($this->_x * $rhs->get_x() +
				$this->_y * $rhs->get_y() +
				$this->_z * $rhs->get_z());
	}

	public function  cos(Vector $rhs)
	{
		$dot = $this->dotProduct($rhs);
		if ($dot == 0)
			return (0);
		return (($this->magnitude() * $rhs->magnitude()) / $dot);
	}

	public function  crossProduct(Vector $rhs)
	{
		return (new Vector(array(
			'dest' => new Vertex(array(
				'x' => $this->_y * $rhs->get_z() - $this->_z * $rhs->get_y(),
				'y' => $this->_z * $rhs->get_x() - $this->_x * $rhs->get_z(),
				'z' => $this->_x * $rhs->get_y() - $this->_y * $rhs->get_x())))));
	}

}
