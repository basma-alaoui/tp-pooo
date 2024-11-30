<?php
include 'Connection.php';
include 'Client.php';

$conn = new Connection();
$conn->selectDatabase('chap4Db');
$clients = Client::selectAllClients('Clients', $conn);
?>