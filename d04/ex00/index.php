<?php

session_start();

function jr_isset($array, $fieldname)
{
	foreach ($array as $key => $value)
	{
		if ($key === $fieldname)
			return (true);
	}
	return (false);
}

$preset_login = "";
$preset_passwd = "";

if (jr_isset($_GET, "login") && jr_isset($_GET, "passwd") && jr_isset($_GET, "submit")){
	if ($_GET["submit"] == "OK"){
		$_SESSION["login"] = $_GET["login"];
		$_SESSION["passwd"] = $_GET["passwd"];
	}
}

if (jr_isset($_SESSION, "login") && jr_isset($_SESSION, "passwd"))
{
	$preset_login = $_SESSION["login"];
	$preset_passwd = $_SESSION["passwd"];
}

?>
<html><body>
<form action="" method="get">
	Username: <input type="text" name="login" value="<?php echo $preset_login?>" />
	<br />
	Password: <input type="text" name="passwd" value="<?php echo $preset_passwd?>" />	
	<input type="submit" name="submit" value="OK">
</form>
</body></html>
