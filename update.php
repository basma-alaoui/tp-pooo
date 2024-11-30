<?php
include 'Connection.php';
include 'Client.php';

$conn = new Connection();
$conn->selectDatabase('chap4Db');
$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $row = Client::selectClientById('Clients', $conn, $id);
    $fnameValue = $row['firstname'];
    $lnameValue = $row['lastname'];
    $emailValue = $row['email'];
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client = new Client($_POST["firstName"], $_POST["lastName"], $_POST["email"], "");
    Client::updateClient($client, 'Clients', $conn, $id);
}
?>