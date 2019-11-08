<?php
header("Connection: close");

function jr_isset($array, $fieldname)
{
	foreach ($array as $key => $value)
	{
		if ($key === $fieldname)
			return (true);
	}
	return (false);
}

function errorrr()
{
	header('WWW-Authenticate: Basic realm="Member area"');
	header('HTTP/1.0 401 Unauthorized');
	echo "<html><body>That area is accessible for members only</body></html>\n";
}

if (jr_isset($_SERVER, 'PHP_AUTH_USER') && jr_isset($_SERVER, 'PHP_AUTH_PW'))
{
	if ($_SERVER['PHP_AUTH_USER'] == 'zaz' && $_SERVER['PHP_AUTH_PW'] == 'jaimelespetitsponeys')
		echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64," . base64_encode(file_get_contents("../img/42.png")) . "'>\n</body></html>\n";
	else
		errorrr();
}
else
{
	errorrr();
}
