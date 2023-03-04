<?php
session_start();
unset($_SESSION['session']); // unset session
header("Location: /");
