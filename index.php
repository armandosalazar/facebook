<?php
session_start(); // Si no uso esta funcion no puedo acceder a los valores

var_dump($_SESSION);
if (isset($_SESSION["session"])) {
    echo "Successfully session!";
}
?>
<button onclick="window.location='/login.php'">Login</button>
