<?php

function jr_isset($array, $fieldname)
{
	foreach ($array as $key => $value)
	{
		if ($key === $fieldname)
			return (true);
	}
	return (false);
}

function do_hash($x_passwd, $x_login)
{
	$res = hash("sha256", $x_passwd . "e36%'fs[vng" . $x_login);
	for ($i = 0; $i < 2941; $i++)
	{
		$res = hash("sha256", $res);
	}
	return ($res);
}

function load_array()
{
	$ret = array();
	if (file_exists('../private/passwd')){
		$ret = unserialize(file_get_contents('../private/passwd'));
	}
	return ($ret);
}

function save_array($array)
{
	if (!file_exists('../private'))
		mkdir('../private', 0777);
	$save = serialize($array);
	file_put_contents("../private/passwd", $save);
}

$users_array = load_array();

if (jr_isset($_POST, "oldpw") && jr_isset($_POST, "newpw") && jr_isset($_POST, "login") && jr_isset($_POST, "submit")){
	if ($_POST["oldpw"] != "" && $_POST["newpw"] != "" && jr_isset($users_array, $_POST["login"]) && $_POST["submit"] == "OK"){
		if ($users_array[$_POST["login"]]["passwd"] === do_hash($_POST["oldpw"], $_POST["login"])){
			$users_array[$_POST["login"]]["passwd"] = do_hash($_POST["newpw"], $_POST["login"]);
			save_array($users_array);
			echo "OK\n";
		}
		else{
			echo "ERROR\n";
		}
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
