<?php
echo "<h1>Schemi di Triangoli</h1>";

// Primo triangolo
echo "<h2>Triangolo 1</h2>";
for ($i = 1; $i <= 5; $i++) { // Numero di righe
    for ($j = 1; $j <= $i; $j++) { // Asterischi per riga
        echo '*';
    }
    echo '<br>'; // Nuova riga
}

// Secondo triangolo
echo "<h2>Triangolo 2</h2>";
for ($i = 5; $i >= 1; $i--) { // Numero di righe decrescente
    for ($j = 1; $j <= $i; $j++) { // Asterischi per riga
        echo '*';
    }
    echo '<br>'; // Nuova riga
}

// Terzo triangolo
echo "<h2>Triangolo 3</h2>";
for ($i = 1; $i <= 5; $i++) { // Numero di righe
    // Spazi iniziali
    for ($j = 1; $j <= (5 - $i); $j++) {
        echo '&nbsp;';
    }
    // Asterischi
    for ($j = 1; $j <= $i; $j++) {
        echo '*';
    }
    echo '<br>'; // Nuova riga
}

// Quarto triangolo
echo "<h2>Triangolo 4</h2>";
for ($i = 5; $i >= 1; $i--) { // Numero di righe decrescente
    // Spazi iniziali
    for ($j = 1; $j <= (5 - $i); $j++) {
        echo '&nbsp;';
    }
    // Asterischi
    for ($j = 1; $j <= $i; $j++) {
        echo '*';
    }
    echo '<br>'; // Nuova riga
}

// Spiegazione del codice
echo "<h2>Spiegazione del Codice</h2>";
echo "<p>Ho creato diversi triangoli utilizzando cicli <code>for</code>:</p>";
echo "<ul>";
echo "<li>Ogni triangolo è generato da uno o due cicli annidati.</li>";
echo "<li>Per andare a capo ho utilizzato <code>echo '&lt;br&gt;';</code>.</li>";
echo "<li>Gli spazi necessari sono stati aggiunti con <code>echo '&nbsp;';</code> per creare i triangoli centrati o invertiti.</li>";
echo "</ul>";

// Link al sommario
echo "<p><a href='index.php'>Torna al sommario</a></p>";
?>
