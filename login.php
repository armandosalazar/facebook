<?php
ob_start();
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

    <h2>Login</h2>
    <form method="post" action="login.php">
        <label>
            Email:
            <input name="email" type="email" required/>
        </label>
        <label>
            Password:
            <input name="password" type="password" required/>
        </label>
        <input type="submit"/>
    </form>
    <h2>Register</h2>
    <form method="post" action="login.php">
        <label>
            Name:
            <input name="name" type="text" required/>
        </label>
        <label>
            Email:
            <input name="email" type="email" required/>
        </label>
        <label>
            Password:
            <input name="password" type="password" required/>
        </label>
        <input type="submit"/>
    </body>

    </html>
<?php
if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($name) or empty($email) or empty($password))
        echo "<h2>Empty fields</h2>";
    else {
        echo "<h1>Works!</h1>";
        echo "<p>$name</p>";
        echo "<p>$email</p>";
        echo "<p>$password</p>";
        if ($name == "Armando Salazar" && $email == "armando@email.com" && $password == "123") {
            $_SESSION['session'] = array(
                "name" => $name,
                "email" => $email,
            );
            echo "$_SESSION[session]";
            var_dump($_SESSION);
            echo "<h2>Successfully register!</h2>";
            sleep(1);
            header("Location: /me.php");
        }
    }
} else if (isset($_POST['email']) and isset($_POST['password'])) {
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
            echo "<h2>Successfully login!</h2>";
            sleep(1);
            header("Location: /");
        }
    }
}
?>