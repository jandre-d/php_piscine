<?php
include 'auth.php';
session_start();

function login_isset($array, $fieldname)
{
	foreach ($array as $key => $value)
	{
		if ($key === $fieldname)
			return (true);
	}
	return (false);
}

$_SESSION['loggued_on_user'] = '';

if (login_isset($_GET, 'login') && login_isset($_GET, 'passwd'))
{
	if (auth($_GET['login'], $_GET['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_GET['login'];
		echo "OK\n";
	}
	else
	{
		echo "ERROR\n";
	}
}
else
{
	echo "ERROR\n";
}