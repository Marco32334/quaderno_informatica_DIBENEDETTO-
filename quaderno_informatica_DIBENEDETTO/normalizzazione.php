<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Normalizzazione - Forme Normali</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        h1, h2 {
            text-align: center;
        }
        p {
            text-align: justify;
            width: 80%;
            margin: 0 auto;
        }
        .back-to-index {
            text-align: center;
            margin-top: 20px;
        }
        .back-to-index a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        .back-to-index a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Normalizzazione - Forme Normali</h1>
    <p>La normalizzazione è un processo utilizzato per organizzare i dati in un database in modo tale da ridurre la ridondanza e migliorare l'integrità dei dati. Esistono diverse forme normali, ognuna delle quali mira a risolvere specifici problemi strutturali nelle tabelle del database.</p>

    <h2>Tabella iniziale (Non normalizzata)</h2>
    <table>
        <tr>
            <th>ID Studente</th>
            <th>Nome</th>
            <th>Corso</th>
            <th>Docente</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Mario Rossi</td>
            <td>Matematica</td>
            <td>Prof. Bianchi</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Mario Rossi</td>
            <td>Fisica</td>
            <td>Prof. Verdi</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Luigi Verdi</td>
            <td>Chimica</td>
            <td>Prof. Gialli</td>
        </tr>
    </table>
    <p>Questa tabella non è normalizzata, perché contiene dati ridondanti (es. il nome dello studente ripetuto per ogni corso).</p>

    <h2>Prima Forma Normale (1NF)</h2>
    <p>In 1NF, ogni colonna contiene valori atomici e ogni riga è unica.</p>
    <table>
        <tr>
            <th>ID Studente</th>
            <th>Nome</th>
            <th>Corso</th>
            <th>Docente</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Mario Rossi</td>
            <td>Matematica</td>
            <td>Prof. Bianchi</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Mario Rossi</td>
            <td>Fisica</td>
            <td>Prof. Verdi</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Luigi Verdi</td>
            <td>Chimica</td>
            <td>Prof. Gialli</td>
        </tr>
    </table>
    <p>Ora ogni valore è atomico, ma ci sono ancora ridondanze.</p>

    <h2>Seconda Forma Normale (2NF)</h2>
    <p>In 2NF, rimuoviamo le dipendenze parziali, separando gli attributi che non dipendono completamente dalla chiave primaria.</p>
    <table>
        <caption>Tabella Studenti</caption>
        <tr>
            <th>ID Studente</th>
            <th>Nome</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Mario Rossi</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Luigi Verdi</td>
        </tr>
    </table>
    <table>
        <caption>Tabella Corsi</caption>
        <tr>
            <th>ID Studente</th>
            <th>Corso</th>
            <th>Docente</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Matematica</td>
            <td>Prof. Bianchi</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Fisica</td>
            <td>Prof. Verdi</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Chimica</td>
            <td>Prof. Gialli</td>
        </tr>
    </table>
    <p>Ora la tabella Studenti e la tabella Corsi sono separate, eliminando le ridondanze parziali.</p>

    <h2>Terza Forma Normale (3NF)</h2>
    <p>In 3NF, rimuoviamo le dipendenze transitive, creando tabelle separate per i dati che non dipendono direttamente dalla chiave primaria.</p>
    <table>
        <caption>Tabella Studenti</caption>
        <tr>
            <th>ID Studente</th>
            <th>Nome</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Mario Rossi</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Luigi Verdi</td>
        </tr>
    </table>
    <table>
        <caption>Tabella Corsi</caption>
        <tr>
            <th>Corso</th>
            <th>Docente</th>
        </tr>
        <tr>
            <td>Matematica</td>
            <td>Prof. Bianchi</td>
        </tr>
        <tr>
            <td>Fisica</td>
            <td>Prof. Verdi</td>
        </tr>
        <tr>
            <td>Chimica</td>
            <td>Prof. Gialli</td>
        </tr>
    </table>
    <table>
        <caption>Tabella Iscrizioni</caption>
        <tr>
            <th>ID Studente</th>
            <th>Corso</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Matematica</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Fisica</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Chimica</td>
        </tr>
    </table>
    <p>Ora i dati sono completamente normalizzati e non ci sono ridondanze o anomalie di aggiornamento.</p>

    <div class="back-to-index">
        <p><a href="index.php">Torna al Sommario</a></p>
    </div>
</body>
</html>
