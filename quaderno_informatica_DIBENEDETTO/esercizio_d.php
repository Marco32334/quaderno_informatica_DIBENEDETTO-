<?php
// Username e password predefiniti
$username_corretta = "admin";
$password_corretta = "1234";

// Controllo se il form è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica delle credenziali
    if ($username === $username_corretta && $password === $password_corretta) {
        echo "<h1>Login eseguito</h1>";
    } else {
        echo "<h1>Credenziali errate</h1>";
    }

    // Link per tornare al form
    echo "<p><a href='esercizio_d.php'>Torna al login</a></p>";
} else {
    // Form per l'inserimento di username e password
    echo "
        <h1>Login</h1>
        <form method='POST' action='esercizio_d.php'>
            <label for='username'>Nome utente:</label>
            <input type='text' id='username' name='username' required><br><br>
            <label for='password'>Password:</label>
            <input type='password' id='password' name='password' required><br><br>
            <button type='submit'>Accedi</button>
        </form>
    ";
}

// Spiegazione del codice
echo "<h2>Spiegazione del Codice</h2>";
echo "<p>Ho creato un sistema di login semplice:</p>";
echo "<ul>";
echo "<li>Le credenziali corrette sono memorizzate in due variabili (<code>\$username_corretta</code> e <code>\$password_corretta</code>).</li>";
echo "<li>Ho utilizzato <code>\$_POST</code> per recuperare i dati inviati dall'utente.</li>";
echo "<li>Se le credenziali corrispondono, viene mostrato un messaggio di successo; altrimenti, un messaggio di errore.</li>";
echo "</ul>";

// Link al sommario
echo "<p><a href='index.php'>Torna al sommario</a></p>";
?>
