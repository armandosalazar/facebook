<?php
session_start();
if (isset($_SESSION['session'])) {
	header("Location: /");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>

<body>

	<form method="post" action="login.php">
		<input name="email" type="email" required />
		<input name="password" type="password" required />
		<input type="submit" />
	</form>
</body>

</html>
<?php
if (isset($_POST['email']) and isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	if (empty($email) or empty($password))
		echo "<h2>Empty fields</h2>";
	else {
		echo "<h1>Works!</h1>";
		echo "<p>$email</p>";
		echo "<p>$password</p>";
		if ($email == "armando@email.com" && $password == "123") {
			session_start();
			$_SESSION['session'] = array(
				"email" => $email,
			);
			echo "$_SESSION[session]";
			var_dump($_SESSION);
			echo "<h2>Succesfully login!</h2>";
			sleep(1);
			header("Location: /");
		}
	}
}
?>