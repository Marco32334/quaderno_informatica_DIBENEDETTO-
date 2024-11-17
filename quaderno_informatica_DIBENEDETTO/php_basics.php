<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Fondamenti di PHP"; ?></title>
</head>
<body>
    <header>
        <h1><?php echo "Fondamenti di PHP"; ?></h1>
        <p><?php echo "Introduzione ai concetti base di PHP."; ?></p>
    </header>
    <main>
        <h2>1. Variabili</h2>
        <pre>
&lt;?php
    $nome = "Mario";
    echo "Ciao, $nome!";
?&gt;
        </pre>
        <h2>2. Condizioni</h2>
        <pre>
&lt;?php
    $eta = 18;
    if ($eta >= 18) {
        echo "Sei maggiorenne.";
    } else {
        echo "Sei minorenne.";
    }
?&gt;
        </pre>
    </main>
    <footer>
        <a href="index.php"><?php echo "Torna al Sommario"; ?></a>
    </footer>
</body>
</html>
