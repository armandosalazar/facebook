<?php
ob_start();
session_start();

if (isset($_SESSION['session'])) {
    $name = $_SESSION['session']['name'];
    $email = $_SESSION['session']['email'];
    echo "<h1>Me</h1>";
    echo "<p>$name</p>";
    echo "<p>$email</p>";
    ?>
    <a href="/">Home</a>
    <a href="settings.php">Settings</a>
    <a href="logout.php">Logout</a>
    <?php
} else {
    header("Location: /");
}
