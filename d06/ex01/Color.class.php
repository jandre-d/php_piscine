<?php

class Color {

	public static $verbose = FALSE;
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public function doc()
	{
		return @file_get_contents(get_class($this) . ".doc.txt");
	}

	public function add(Color $another)
	{
		return (new Color(array(
			'red' => $this->red + $another->red,
			'green' => $this->green + $another->green,
			'blue' => $this->blue + $another->blue)));
	}

	public function sub(Color $another)
	{
		return (new Color(array(
			'red' => $this->red - $another->red,
			'green' => $this->green - $another->green,
			'blue' => $this->blue - $another->blue)));
	}

	public function mult($notAnother)
	{
		return (new Color(array(
			'red' => $this->red * $notAnother,
			'green' => $this->green * $notAnother,
			'blue' => $this->blue * $notAnother)));
	}

	function __construct(array $kwargs)
	{
		if (array_key_exists('red', $kwargs))
			$this->red = (int)$kwargs['red'];
		if (array_key_exists('green', $kwargs))
			$this->green = (int)$kwargs['green'];
		if (array_key_exists('blue', $kwargs))
			$this->blue = (int)$kwargs['blue'];
		if (array_key_exists('rgb', $kwargs))
		{
			$this->red = (int)$kwargs['rgb'] >> (8 * 2) & 0xff;
			$this->green = (int)$kwargs['rgb'] >> (8 * 1) & 0xff;
			$this->blue = (int)$kwargs['rgb'] & 0xff;
		}
		if (Color::$verbose)
		{
			echo $this . " constructed.\n";
		}
	}

	function __destruct()
	{
		if (Color::$verbose)
		{
			echo $this . " destructed.\n";
		}
	}

	function __toString()
	{
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue)); 
	}

}

