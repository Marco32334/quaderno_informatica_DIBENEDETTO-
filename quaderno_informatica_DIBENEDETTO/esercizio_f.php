<?php
// Inizializzare le variabili per salvare le credenziali
session_start(); // Per memorizzare le credenziali temporaneamente
$email_corretta = "";
$password_corretta = "";

// Controllare se è stato inviato il form per il Sign In
if (isset($_POST['signup'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($email && !empty($password)) {
        // Salvare le credenziali in sessione
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        echo "<h1>Sign In completato</h1>";
        echo "<p>Email e password salvate correttamente.</p>";
        echo "<p><a href='esercizio_f.php'>Torna alla pagina per effettuare il Login</a></p>";
    } else {
        echo "<h1>Errore</h1>";
        echo "<p>Email non valida o password vuota. Riprova.</p>";
        echo "<p><a href='esercizio_f.php'>Torna al Sign In</a></p>";
    }
    exit;
}

// Controllare se è stato inviato il form per il Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Recuperare le credenziali salvate
    $email_corretta = $_SESSION['email'] ?? "";
    $password_corretta = $_SESSION['password'] ?? "";

    // Verificare le credenziali
    if ($email === $email_corretta && $password === $password_corretta) {
        echo "<h1>Bravo! Hai acceduto alla pagina.</h1>";
    } else {
        echo "<h1>Password o email errate.</h1>";
    }

    echo "<p><a href='esercizio_f.php'>Torna al Login</a></p>";
    exit;
}

// Form per il Sign In e il Login
echo "
<h1>Sign In</h1>
<form method='POST' action='esercizio_f.php'>
    <label for='email'>Email:</label>
    <input type='email' id='email' name='email' required><br><br>
    <label for='password'>Password:</label>
    <input type='password' id='password' name='password' required><br><br>
    <button type='submit' name='signup'>Sign In</button>
</form>
<hr>
<h1>Login</h1>
<form method='POST' action='esercizio_f.php'>
    <label for='email'>Email:</label>
    <input type='email' id='email' name='email' required><br><br>
    <label for='password'>Password:</label>
    <input type='password' id='password' name='password' required><br><br>
    <button type='submit' name='login'>Login</button>
</form>
";

// Spiegazione del codice
echo "<h2>Spiegazione del Codice</h2>";
echo "<p>Ho implementato un sistema di Sign In e Login con validazione dell'email e gestione temporanea delle credenziali:</p>";
echo "<ul>";
echo "<li>Durante il Sign In, utilizzo <code>filter_var()</code> per validare l'email e salvo email e password nella sessione PHP (<code>\$_SESSION</code>).</li>";
echo "<li>Durante il Login, confronto le credenziali fornite con quelle salvate in sessione.</li>";
echo "<li>Se corrispondono, viene mostrato un messaggio di accesso riuscito; altrimenti, un errore.</li>";
echo "</ul>";

// Link al sommario
echo "<p><a href='index.php'>Torna al sommario</a></p>";
?>
