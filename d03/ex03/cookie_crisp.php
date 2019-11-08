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

if (jr_isset($_GET, "action") && jr_isset($_GET, "name"))
{
	if ($_GET["action"] == 'set' && jr_isset($_GET, "value")){
		setcookie($_GET["name"], $_GET["value"], time() + (86400 * 90), "/");
	}
	elseif ($_GET["action"] == 'get'){
		if (jr_isset($_COOKIE, $_GET["name"]))
		{
			echo $_COOKIE[$_GET["name"]] . "\n";
		}
	}
	elseif ($_GET["action"] == 'del'){
		if ($_GET["name"]){
			setcookie($_GET["name"], "", time() + (86400 * -1), "/");
		}
	}
}

?>
