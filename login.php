<?php
// Połączenie z bazą danych
$servername = "125.0.0.1";
$username = "root";
$password = "";
$dbname = "logowanie_1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
  die("Połączenie nieudane: " . $conn->connect_error);
}

// Pobranie danych z formularza
$username = $_POST["username"];
$password = $_POST["password"];

// Przygotowanie zapytania SQL
$sql = "INSERT INTO logowanie_1 (username, password) VALUES ('$username', '$password')";

// Wykonanie zapytania
if ($conn->query($sql) === TRUE) {
  echo "Zalogowano pomyślnie!";
} else {
  echo "Błąd: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
