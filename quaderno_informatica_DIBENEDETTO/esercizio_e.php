<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recuperare il valore selezionato dall'utente
    $n = (int)$_POST['numero'];

    // Generare la tabella se il numero è valido
    if ($n >= 1 && $n <= 10) {
        echo "<h1>Tabella di Quadrati e Cubi</h1>";
        echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";
        echo "<tr><th>Numero</th><th>Quadrato</th><th>Cubo</th></tr>";

        for ($i = 1; $i <= $n; $i++) {
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>" . ($i ** 2) . "</td>";
            echo "<td>" . ($i ** 3) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Numero non valido. Ricarica la pagina per riprovare.</p>";
    }

    // Spiegazione del codice
    echo "<h2>Spiegazione del Codice</h2>";
    echo "<p>In questa pagina ho creato una tabella dinamica basata su un numero scelto dall'utente:</p>";
    echo "<ul>";
    echo "<li>Ho utilizzato un menù a tendina (<code>&lt;select&gt;</code>) per limitare la scelta dell'utente a numeri tra 1 e 10.</li>";
    echo "<li>Dopo l'invio del form, il numero selezionato è stato recuperato tramite <code>\$_POST</code>.</li>";
    echo "<li>Un ciclo <code>for</code> è stato utilizzato per calcolare e visualizzare i quadrati e i cubi dei numeri da 1 a <code>N</code>.</li>";
    echo "<li>Ho aggiunto controlli per garantire che il numero sia compreso tra 1 e 10.</li>";
    echo "</ul>";

    // Link al sommario
    echo "<p><a href='index.php'>Torna al sommario</a></p>";
} else {
    // Visualizzare il form
    echo "
        <h1>Genera Tabella di Quadrati e Cubi</h1>
        <form method='POST' action='esercizio_e.php'>
            <label for='numero'>Scegli un numero tra 1 e 10:</label>
            <select id='numero' name='numero' required>
    ";

    // Generare le opzioni del menù a tendina
    for ($i = 1; $i <= 10; $i++) {
        echo "<option value='$i'>$i</option>";
    }

    echo "
            </select>
            <br><br>
            <button type='submit'>Crea Tabella</button>
        </form>
    ";
}
?>
