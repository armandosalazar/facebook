<?php
session_start(); // Si no uso esta funcion no puedo acceder a los valores

var_dump($_SESSION);
if (isset($_SESSION["session"])) {
    echo "<p>Successfully session!</p>";
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button onclick="window.location='/login.php'">Login</button>
</body>

</html>