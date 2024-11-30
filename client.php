<?php
class Client {
    public $id, $firstname, $lastname, $email, $password, $reg_date;
    public static $errorMsg = "";
    public static $successMsg = "";

    public function __construct($firstname, $lastname, $email, $password) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function insertClient($tableName, $conn) {
        $sql = "INSERT INTO $tableName (firstname, lastname, email, password)
                VALUES ('$this->firstname', '$this->lastname', '$this->email', '$this->password')";
        if ($conn->conn->query($sql) === TRUE) {
            self::$successMsg = "Client added successfully!";
        } else {
            self::$errorMsg = "Error: " . $conn->conn->error;
        }
    }

    public static function selectAllClients($tableName, $conn) {
        $data = [];
        $sql = "SELECT * FROM $tableName";
        $result = $conn->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public static function selectClientById($tableName, $conn, $id) {
        $sql = "SELECT * FROM $tableName WHERE id=$id";
        $result = $conn->conn->query($sql);
        return $result->fetch_assoc();
    }

    public static function updateClient($client, $tableName, $conn, $id) {
        $sql = "UPDATE $tableName SET 
                firstname='$client->firstname', 
                lastname='$client->lastname', 
                email='$client->email' 
                WHERE id=$id";
        $conn->conn->query($sql);
        header("Location: read.php");
    }

    public static function deleteClient($tableName, $conn, $id) {
        $sql = "DELETE FROM $tableName WHERE id=$id";
        $conn->conn->query($sql);
        header("Location: read.php");
    }
}
?>