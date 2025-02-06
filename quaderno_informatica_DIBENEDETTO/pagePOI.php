<?php
// Abilita la segnalazione degli errori di MySQLi per debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Connessione al database
$connection = mysqli_connect("localhost", "root", "", "POI");

if (!$connection) {
    die("Errore di connessione al database: " . mysqli_connect_error());
}

// Controllo che i parametri GET siano settati e validi
if (!isset($_GET['password']) || trim($_GET['password']) == "") {
    die("Password non specificata.");
}
if (!isset($_GET['latitudine'], $_GET['longitudine'])) {
    die("Coordinate non specificate.");
}

$password = mysqli_real_escape_string($connection, $_GET['password']);
$latit = (float) $_GET['latitudine'];
$longit = (float) $_GET['longitudine'];

// Verifica della password nel database
$query = "SELECT * FROM biglietti WHERE nonce = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    die("Password non abilitata.");
}

// Recupera tutti i POI dal database
$query = "SELECT * FROM poi;";
$respoi = mysqli_query($connection, $query);

if (!$respoi || mysqli_num_rows($respoi) == 0) {
    die("Nessun POI trovato.");
}

// Funzione per calcolare la distanza tra due coordinate geografiche (Haversine formula)
function distance($lat1, $lat2, $lon1, $lon2)
{
    $R = 6371; // Raggio della Terra in km
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);
    $a = sin($dLat / 2) * sin($dLat / 2) +
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
        sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    return $R * $c;
}

// Trova il POI più vicino all'interno del raggio di tolleranza
$id_poi = -1;
$distmin = -1;

while ($rowpoi = mysqli_fetch_assoc($respoi)) {
    $dist = distance($latit, $rowpoi['latitudine'], $longit, $rowpoi['longitudine']);
    if ($dist <= $rowpoi['raggio_tolleranza']) {
        if ($distmin == -1 || $dist < $distmin) {
            $id_poi = $rowpoi['id_poi'];
            $distmin = $dist;
        }
    }
}

if ($id_poi == -1) {
    die("POI non censito.");
}

// Recupera descrizione e media del POI
$query = "SELECT poi.descrizione, immagini.link_video_b, immagini.link_immagine, 
                 descrizioni_img.didascalia, descrizioni_img.lingua
          FROM poi
          JOIN immagini ON poi.id_poi = immagini.id_poi
          JOIN descrizioni_img ON immagini.id_poi = descrizioni_img.id_poi 
                                AND immagini.id_immagine = descrizioni_img.id_immagine
          WHERE poi.id_poi = ?
          AND immagini.tipo_B = 'S'
          AND descrizioni_img.lingua IN ('ENG','ITA')
          ORDER BY immagini.id_immagine, lingua DESC;";

$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "i", $id_poi);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Nessun dato POI trovato.");
}

// Recupera la prima riga per il titolo e il video
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Assessorato al Turismo</title>
</head>
<body>
    <h1><?php echo "Percorso base POI: " . htmlspecialchars($row['descrizione']); ?></h1>

    <!-- Video -->
    <video width="320" height="240" controls>
        <source src="<?php echo htmlspecialchars($row['link_video_b']); ?>" type="video/mp4">
        Il tuo browser non supporta il tag video.
    </video>
    <br><br>

    <!-- Immagini e didascalie -->
    <?php
    for ($i = 1; $i <= 3; $i++) {
        if (!$row) break; // Se i dati finiscono prima di 3 immagini, esce dal ciclo

        echo '<img src="' . htmlspecialchars($row['link_immagine']) . '" alt="Immagine POI">';
        echo "<br>";
        echo "Didascalia ITA: " . htmlspecialchars($row['didascalia']);
        echo "<br>";

        // Recupera la didascalia inglese
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            echo "Didascalia ENG: " . htmlspecialchars($row['didascalia']);
            echo "<br><br>";
        }

        // Passa alla riga successiva solo se ci sono ancora dati
        if ($i < 3) {
            $row = mysqli_fetch_assoc($result);
        }
    }

    // Chiudi la connessione al database
    mysqli_free_result($result);
    mysqli_close($connection);
    ?>
</body>
</html>
