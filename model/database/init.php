<?php

$DB = include_once "connection.php";

$createStatement = "
    CREATE TABLE IF NOT EXISTS user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        password_hash VARCHAR(255) NOT NULL,
        phonenumber VARCHAR(15) NOT NULL
    )
";

// Perform the query to create the 'user' table
if ($DB->query($createStatement) === TRUE) {
    echo "Table 'user' created successfully";
} else {
    echo "Error creating table: " . $DB->error;
}

?>