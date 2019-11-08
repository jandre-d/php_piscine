<?php

function auth_isset($array, $fieldname)
{
	foreach ($array as $key => $value)
	{
		if ($key === $fieldname)
			return (true);
	}
	return (false);
}

function auth_do_hash($x_passwd, $x_login)
{
	$res = hash("sha256", $x_passwd . "e36%'fs[vng" . $x_login);
	for ($i = 0; $i < 2941; $i++)
	{
		$res = hash("sha256", $res);
	}
	return ($res);
}

function auth_load_array()
{
	$ret = array();
	if (file_exists('../private/passwd'))
	{
		$ret = unserialize(file_get_contents('../private/passwd'));
	}
	return ($ret);
}

function auth($login, $passwd)
{
	$users = auth_load_array();
	if ($passwd === "")
		return (false);
	$hased_passwd = auth_do_hash($passwd, $login);
	if (auth_isset($users, $login))
	{
		if ($users[$login]["passwd"] === $hased_passwd)
			return (true);
	}
	return (false);
}
