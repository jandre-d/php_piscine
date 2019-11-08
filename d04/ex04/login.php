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

if (login_isset($_POST, 'login') && login_isset($_POST, 'passwd'))
{
	if (auth($_POST['login'], $_POST['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_POST['login'];
		?>
		<html>
			<head>
				<style>
					body {
						background-color: orange;
					}

					h1 {
						text-align: center;
					}
				</style>
			</head>
			<body>
			<h1>42 chat</h1>

			<iframe name="chat" src="chat.php" width="100%" height="550"> </iframe>
			<iframe name="chat" src="speak.php" width="100%" height="50"> </iframe>

			<hr>
			<div id="login">@jandre-d 2019</div>

		</body></html>
		<?php
	}
	else
	{
		echo "ERROR\n";
		header("Location: index.html");
	}
}
else
{
	echo "ERROR\n";
	header("Location: index.html");
}