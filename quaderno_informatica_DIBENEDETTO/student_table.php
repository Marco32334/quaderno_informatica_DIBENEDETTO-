<?php
// Avvia la sessione per salvare i dati degli studenti
session_start();

// Inizializza l'array degli studenti nella sessione se non esiste
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

// Se non ci sono studenti nella sessione, aggiungi un array vuoto
if (empty($_SESSION['students'])) {
    $_SESSION['students'][] = [];
}

// Ottieni l'indice dello studente corrente
$currentStudentIndex = count($_SESSION['students']) - 1;

// Ottieni i dati dello studente corrente
$currentStudentGrades = $_SESSION['students'][$currentStudentIndex] ?? [];

// Salva la tabella corrente nella sessione
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save_table'])) {
        $_SESSION['students'][$currentStudentIndex] = $_POST['grades'] ?? [];
    } elseif (isset($_POST['new_student'])) {
        $_SESSION['students'][] = [];
        $currentStudentIndex = count($_SESSION['students']) - 1;
        $currentStudentGrades = [];
    } elseif (isset($_POST['go_to_summary'])) {
        // Reindirizza alla pagina del sommario
        header('Location: index.php');
        exit;
    }
}

// Calcola la media se richiesto
$average = null;
if (isset($_POST['calculate_average'])) {
    $grades = $_POST['grades'] ?? [];
    $sum = 0;
    $count = 0;
    foreach ($grades as $grade) {
        if (isset($grade['voto']) && is_numeric($grade['voto'])) {
            $sum += (float)$grade['voto'];
            $count++;
        }
    }
    $average = $count > 0 ? $sum / $count : null;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabella Studente</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
    <script>
        function addRow() {
            const table = document.getElementById('gradesTable');
            const newRow = table.insertRow(-1);
            newRow.innerHTML = `
                <td><input type="text" name="grades[][nome]" placeholder="Nome"></td>
                <td><input type="text" name="grades[][cognome]" placeholder="Cognome"></td>
                <td><input type="text" name="grades[][materia]" placeholder="Materia"></td>
                <td><input type="text" name="grades[][argomento]" placeholder="Argomento"></td>
                <td><input type="number" name="grades[][voto]" placeholder="Voto" step="0.01"></td>
            `;
        }
    </script>
</head>
<body>
    <h1>Tabella Studente</h1>
    <form method="post">
        <table id="gradesTable">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Materia</th>
                    <th>Argomento</th>
                    <th>Voto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($currentStudentGrades as $grade): ?>
                    <tr>
                        <td><input type="text" name="grades[][nome]" value="<?= htmlspecialchars($grade['nome'] ?? '') ?>"></td>
                        <td><input type="text" name="grades[][cognome]" value="<?= htmlspecialchars($grade['cognome'] ?? '') ?>"></td>
                        <td><input type="text" name="grades[][materia]" value="<?= htmlspecialchars($grade['materia'] ?? '') ?>"></td>
                        <td><input type="text" name="grades[][argomento]" value="<?= htmlspecialchars($grade['argomento'] ?? '') ?>"></td>
                        <td><input type="number" name="grades[][voto]" value="<?= htmlspecialchars($grade['voto'] ?? '') ?>" step="0.01"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="button" onclick="addRow()">Aggiungi Riga</button>
        <button type="submit" name="save_table">Salva Tabella</button>
        <button type="submit" name="new_student">Crea Nuovo Studente</button>
        <button type="submit" name="calculate_average">Calcola Media</button>
        <button type="submit" name="go_to_summary">Torna al Sommario</button>
        <?php if ($average !== null): ?>
            <p>Media: <strong><?= number_format($average, 2) ?></strong></p>
        <?php endif; ?>
    </form>

    <div style="margin-top: 20px; border-top: 1px solid #ccc; padding-top: 10px;">
        <h3>Come funziona il codice?</h3>
        <p>Questa pagina permette di gestire i voti di uno studente. Ecco le funzionalità principali:</p>
        <ul>
            <li><strong>Aggiungi Riga:</strong> Consente di aggiungere nuove righe alla tabella per inserire ulteriori voti.</li>
            <li><strong>Salva Tabella:</strong> Salva i dati correnti della tabella nella sessione, così da non perderli se si ricarica la pagina.</li>
            <li><strong>Crea Nuovo Studente:</strong> Avvia una nuova tabella vuota per un nuovo studente, mantenendo salvati i dati degli studenti precedenti.</li>
            <li><strong>Calcola Media:</strong> Calcola la media dei voti inseriti nella tabella attuale e la mostra sotto i pulsanti.</li>
            <li><strong>Torna al Sommario:</strong> Reindirizza alla pagina "index.php", che rappresenta il sommario o la pagina principale.</li>
        </ul>
        <p>I dati vengono salvati nella <strong>sessione</strong>, che consente di mantenere le informazioni finché il browser rimane aperto. Tuttavia, non vengono salvati in modo permanente (ad esempio, in un file o database).</p>
    </div>
</body>
</html>
