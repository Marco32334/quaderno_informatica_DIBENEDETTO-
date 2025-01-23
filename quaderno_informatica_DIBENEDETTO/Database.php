<?php
// Abilita la visualizzazione degli errori
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database {
    private $host = 'localhost';
    private $db_name = 'cinema_db';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Metodo per ottenere la connessione al database
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Errore di connessione: " . $e->getMessage();
        }

        return $this->conn;
    }
}

$db = new Database();
$conn = $db->connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrazione Dati</title>
</head>
<body>
    <h1>Seleziona i dati da estrarre</h1>
    <form method="POST" action="">
        <label for="data_type">Scegli il tipo di dati:</label>
        <select name="data_type" id="data_type">
            <option value="films">Film</option>
            <option value="halls">Sale</option>
            <option value="shows">Spettacoli</option>
            <option value="bookings">Prenotazioni</option>
        </select>
        <button type="submit">Estrai</button>
    </form>

    <?php
    // Estrazione dei dati in base alla selezione dell'utente
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data_type'])) {
        $data_type = $_POST['data_type'];
        $query = "SELECT * FROM " . htmlspecialchars($data_type); // Protezione contro SQL Injection
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo "<h2>Risultati:</h2>";
            if ($results) {
                echo "<table border='1'>";
                echo "<tr>";
                foreach (array_keys($results[0]) as $column) {
                    echo "<th>" . htmlspecialchars($column) . "</th>";
                }
                echo "</tr>";
                foreach ($results as $row) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Nessun dato trovato.";
            }
        } catch (PDOException $e) {
            echo "Errore nella query: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>
