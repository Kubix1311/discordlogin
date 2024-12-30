<?php
session_start();

// Konfiguracja bazy danych
$host = '125.0.0.1';
$dbname = 'example_db';
$username = 'root'; // Użytkownik bazy danych
$password = '';     // Hasło bazy danych

try {
    // Połączenie z bazą danych
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Obsługa żądania POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Sprawdzenie danych użytkownika
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username AND password = MD5(:password)');
    $stmt->execute(['username' => $user, 'password' => $pass]);
    $user = $stmt->fetch();

    if ($user) {
        // Zalogowano poprawnie
        $_SESSION['username'] = $user['username'];
        header('Location: welcome.php');
        exit;
    } else {
        // Nieprawidłowe dane logowania
        echo '<p style="color: red;">Invalid username or password</p>';
    }
}
?>
