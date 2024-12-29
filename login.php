<?php
// Połączenie z bazą danych
$servername = "127.0.0.1";
$username = "root"; // Zmień na swoją nazwę użytkownika
$password = ""; // Zmień na swoje hasło
$dbname = "logowanie_1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Sprawdzenie, czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Szyfrowanie hasła
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Wstawienie danych do bazy
    $sql = "INSERT INTO logowanie_1 (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Rejestracja zakończona sukcesem!";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}

// Wyświetlenie zarejestrowanych użytkowników
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
