<?php

$servername = "125.0.0.1";
$username = "root";
$password = ""; 
$dbname = "logowanie_1";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO logowanie_1 (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Rejestracja zakończona sukcesem!";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}


$sql = "SELECT username FROM logowanie_1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista zarejestrowanych użytkowników:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["username"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Brak zarejestrowanych użytkowników.";
}

$conn->close();
?>
