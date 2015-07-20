<?php

// Create connection credentials 
$db_host = 'localhost'; // true 99% of the time
$db_name = 'php_quizzer';
$db_user = 'root';
$db_pass = 'm3m3th3tm0n';

// Create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Error Handler
if($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
