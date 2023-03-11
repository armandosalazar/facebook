<?php
$host = 'localhost';
$port = '8080';
$null = NULL;

//Create TCP/IP stream socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);