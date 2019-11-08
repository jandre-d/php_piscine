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
	if (jr_isset($_POST, 'submit') && jr_isset($_POST, 'say') && $_POST['submit'] === 'OK')
	{
		if (!file_exists('../private'))
			mkdir('../private', 0777);
		if (!file_exists('../private/chat'))
		{
			file_put_contents('../private/chat', array());
		}

		$file = fopen('../private/chat', 'r+');

		flock($file, LOCK_EX);
		$chat_array = unserialize(file_get_contents('../private/chat'));
		$chat_array[] = array('login' => $_SESSION['loggued_on_user'], 'time' => time(), 'msg' => $_POST['say']);
		file_put_contents('../private/chat', serialize($chat_array));
		flock($file, LOCK_UN);
		fclose($file);
	}
	?>
	<html>
		<head>
			<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
			<style>
				body{
					overflow:hidden;
				}
			</style>
		</head>
		<body>
			<form action="speak.php" method="post">
				<input type="text" name="say" style="height: 100%; width: 100%; margin: 0 0; padding: 0 0;" value="" autofocus/>
				<input type="submit" name="submit" style="visibility: hidden;" value="OK">
			</form>
		</body>
	</html>
	<?php
}
else
	echo "ERROR\n";
