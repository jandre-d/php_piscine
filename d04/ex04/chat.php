<?php

session_start();
date_default_timezone_set("Europe/Amsterdam");

function jr_isset($array, $fieldname)
{
	foreach ($array as $key => $value)
	{
		if ($key === $fieldname)
			return (true);
	}
	return (false);
}

if (jr_isset($_SESSION, 'loggued_on_user') && $_SESSION['loggued_on_user'] !== '')
{
	if (file_exists('../private/chat'))
	{
		?>
		<html>
		<head>
			
		</head>
		<body>
		<?php
		$file = fopen('../private/chat', 'r');

		flock($file, LOCK_EX);
		$chat_array = unserialize(file_get_contents('../private/chat'));
		foreach ($chat_array as $entry)
		{
			echo $entry['login'] . " " . date('H:i', $entry['time']) . " " . $entry['msg'] . "<br />";
		}
		flock($file, LOCK_UN);
		fclose($file);
		?>
			</body>
			</html>
		<?php
	}
}
