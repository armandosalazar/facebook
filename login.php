<!doctype html>
<html lang="es">
<form method="post" action="login.php">
	<input name="email" type="email" required />
	<input name="password" type="password" required />
	<input type="submit" />
</form>

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
		}
	}
}
?>