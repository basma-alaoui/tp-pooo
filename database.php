<?php
include 'Connection.php';

$conn = new Connection();
$conn->createDatabase('chap4Db');

$query = "
CREATE TABLE IF NOT EXISTS Clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->selectDatabase('chap4Db');
$conn->createTable($query);
?>