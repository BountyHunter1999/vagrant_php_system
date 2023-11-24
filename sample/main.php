<?php 

// Fetch MySQL host from environment variable
$mysql_host = getenv("MYSQL_HOST");

if ($mysql_host != false) {
    // MySQL Connection
    $mysql_user = getenv("MYSQL_USER");
    $mysql_pass = getenv("MYSQL_PASS");
    $mysql_db = getenv("MYSQL_DB");

    $mysql_conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_db", $mysql_user, $mysql_pass);
    if ($mysql_conn) {
        echo "Connected to MySQL successfull!<br>";
    } else {
        echo "Failed to connect to MySQL!<br>";
    }
} else {
    echo "MySQL host not found in environment variables!<br>";
}
