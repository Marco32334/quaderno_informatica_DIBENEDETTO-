<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Query SQL di Base"; ?></title>
</head>
<body>
    <header>
        <h1><?php echo "Query SQL di Base"; ?></h1>
        <p><?php echo "Introduzione ai concetti base di SQL per la gestione dei database."; ?></p>
    </header>
    <main>
        <h2>1. Cosa e SQL?</h2>
        <p><?php echo "SQL (Structured Query Language) e un linguaggio standard per interagire con i database."; ?></p>

        <h2>2. Creare una Tabella</h2>
        <p><?php echo "Esempio di comando per creare una nuova tabella:"; ?></p>
        <pre>
CREATE TABLE utenti (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50),
    email VARCHAR(100),
    eta INT
);
        </pre>

        <h2>3. Inserire Dati</h2>
        <p><?php echo "Usa il comando INSERT INTO per aggiungere dati in una tabella:"; ?></p>
        <pre>
INSERT INTO utenti (nome, email, eta) 
VALUES ('Mario Rossi', 'mario@example.com', 30);
        </pre>

        <h2>4. Leggere Dati</h2>
        <p><?php echo "Usa il comando SELECT per leggere dati da una tabella:"; ?></p>
        <pre>
SELECT * FROM utenti;
        </pre>

        <h2>5. Aggiornare Dati</h2>
        <p><?php echo "Esempio di comando UPDATE per modificare dati esistenti:"; ?></p>
        <pre>
UPDATE utenti 
SET email = 'nuovamail@example.com', eta = 31 
WHERE id = 1;
        </pre>

        <h2>6. Eliminare Dati</h2>
        <p><?php echo "Esempio di comando DELETE per rimuovere dati:"; ?></p>
        <pre>
DELETE FROM utenti 
WHERE id = 1;
        </pre>

        <h2>7. Funzioni di Aggregazione</h2>
        <p><?php echo "Le funzioni di aggregazione permettono di calcolare statistiche sui dati:"; ?></p>
        <pre>
SELECT COUNT(*) AS totale_utenti FROM utenti;
SELECT AVG(eta) AS eta_media FROM utenti;
SELECT MAX(eta) AS eta_massima FROM utenti;
        </pre>
    </main>
    <footer>
        <a href="index.php"><?php echo "Torna al Sommario"; ?></a>
    </footer>
</body>
</html>
