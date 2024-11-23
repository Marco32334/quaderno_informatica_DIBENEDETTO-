<?php
echo "<h1>Tabella Pitagorica</h1>";
echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";

// Riga di intestazione con numeri
echo "<tr><th></th>";
for ($i = 1; $i <= 10; $i++) {
    echo "<th>$i</th>";
}
echo "</tr>";

// Creazione righe della tabella
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    echo "<th>$i</th>"; // Intestazione laterale
    for ($j = 1; $j <= 10; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

// Spiegazione del codice
echo "<h2>Spiegazione del Codice</h2>";
echo "<p>La tabella Pitagorica è stata creata utilizzando HTML e PHP:</p>";
echo "<ul>";
echo "<li>Ho usato un ciclo <code>for</code> per creare la riga di intestazione con i numeri da 1 a 10.</li>";
echo "<li>Ho utilizzato un doppio ciclo <code>for</code> per generare le righe e le celle. Ogni cella contiene il prodotto del numero della riga e della colonna.</li>";
echo "<li>Ho aggiunto stili CSS inline per rendere la tabella leggibile, come <code>border='1'</code> e <code>text-align: center</code>.</li>";
echo "<li>Le intestazioni delle righe e delle colonne sono state create separatamente per maggiore chiarezza.</li>";
echo "</ul>";

// Link al sommario
echo "<p><a href='index.php'>Torna al sommario</a></p>";
?>
