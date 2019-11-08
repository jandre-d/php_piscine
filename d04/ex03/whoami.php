<?php

function whoami_isset($array, $fieldname)
{
	foreach ($array as $key => $value)
	{
		if ($key === $fieldname)
			return (true);
	}
	return (false);
}

session_start();

if (whoami_isset($_SESSION, 'loggued_on_user'))
{
	if ($_SESSION['loggued_on_user'] == '')
	{
		echo "ERROR\n";
	}
	else
	{
		echo $_SESSION['loggued_on_user'] . "\n";
	}
}
else
{
	echo "ERROR\n";
}
