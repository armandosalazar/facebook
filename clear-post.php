<?php
session_start();
if (isset($_SESSION['session'])) {
    session_destroy(); // destroy session
    header("Location: /");
}
