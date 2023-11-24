<?php 

// Fetch MySQL host from environment variable
// $mysql_host = getenv("MYSQL_HOST");
$mysql_host = '192.168.56.6';

if ($mysql_host != false) {
    // MySQL Connection
    $mysql_user = 'vagrant';
    $mysql_pass = 'pokemon123';
    $mysql_db = 'db_test';
    // $mysql_user = getenv("MYSQL_USER");
    // $mysql_pass = getenv("MYSQL_PASS");
    // $mysql_db = getenv("MYSQL_DB");

    $mysql_conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_db", $mysql_user, $mysql_pass);
    if ($mysql_conn) {
        echo "Connected to MySQL successfull!<br>";
    } else {
        echo "Failed to connect to MySQL!<br>";
    }
} else {
    echo "MySQL host not found in environment variables!<br>";
}
