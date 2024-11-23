<?php
// Variabile con il nome
$nome = "Paolo";

// Determinare il messaggio in base all'ora
$ora = date("H"); // Ora attuale in formato 24 ore
if ($ora >= 8 && $ora < 12) {
    $saluto = "Buongiorno";
} elseif ($ora >= 12 && $ora < 20) {
    $saluto = "Buonasera";
} else {
    $saluto = "Buonanotte";
}

// Recuperare il browser dell'utente
$browser = $_SERVER['HTTP_USER_AGENT'];
if (strpos($browser, 'Firefox') !== false) {
    $browser_tipo = "Firefox";
} elseif (strpos($browser, 'Chrome') !== false) {
    $browser_tipo = "Chrome";
} elseif (strpos($browser, 'Safari') !== false) {
    $browser_tipo = "Safari";
} elseif (strpos($browser, 'Edge') !== false) {
    $browser_tipo = "Edge";
} elseif (strpos($browser, 'Opera') !== false || strpos($browser, 'OPR') !== false) {
    $browser_tipo = "Opera";
} else {
    $browser_tipo = "un browser sconosciuto";
}

// Stampare il messaggio
echo "<h1>$saluto $nome, benvenuta nella mia prima pagina PHP!</h1>";
echo "<p>Stai usando il browser: $browser_tipo</p>";

// Spiegazione del codice
echo "<h2>Spiegazione del Codice</h2>";
echo "<p>In questo esercizio ho creato un messaggio personalizzato:</p>";
echo "<ul>";
echo "<li>Ho usato <code>date('H')</code> per ottenere l'ora attuale e determinare il saluto appropriato (Buongiorno, Buonasera, Buonanotte).</li>";
echo "<li>Il nome è memorizzato in una variabile <code>\$nome</code>, rendendo il messaggio personalizzabile.</li>";
echo "<li>Ho analizzato il browser dell'utente utilizzando <code>\$_SERVER['HTTP_USER_AGENT']</code> e la funzione <code>strpos</code> per rilevarne il tipo.</li>";
echo "</ul>";

// Link al sommario
echo "<p><a href='index.php'>Torna al sommario</a></p>";
?>
