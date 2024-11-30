<?php
include 'Connection.php';
include 'Client.php';

$conn = new Connection();
$conn->selectDatabase('chap4Db');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    Client::deleteClient('Clients', $conn, $id);
}
?>