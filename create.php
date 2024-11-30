<?php
include 'Connection.php';
include 'Client.php';

$emailValue = $lnameValue = $fnameValue = $passwordValue = $errorMesage = $successMesage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailValue = $_POST["email"];
    $lnameValue = $_POST["lastName"];
    $fnameValue = $_POST["firstName"];
    $passwordValue = $_POST["password"];

    if (empty($emailValue) || empty($fnameValue) || empty($lnameValue) || empty($passwordValue)) {
        $errorMesage = "All fields must be filled out!";
    } elseif (strlen($passwordValue) < 8 || !preg_match("/[A-Z]/", $passwordValue)) {
        $errorMesage = "Password must contain at least 8 characters and one capital letter!";
    } else {
        $conn = new Connection();
        $conn->selectDatabase('chap4Db');

        $client = new Client($fnameValue, $lnameValue, $emailValue, $passwordValue);
        $client->insertClient('Clients', $conn);

        $successMesage = Client::$successMsg;
        $errorMesage = Client::$errorMsg;

        if (empty($errorMesage)) {
            $emailValue = $lnameValue = $fnameValue = "";
        }
    }
}
?>