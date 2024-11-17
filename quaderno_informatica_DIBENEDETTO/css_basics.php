<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Fondamenti di CSS"; ?></title>
</head>
<body>
    <header>
        <h1><?php echo "Fondamenti di CSS"; ?></h1>
        <p><?php echo "Impara a personalizzare il tuo sito web."; ?></p>
    </header>
    <main>
        <h2>1. Collegare CSS a una pagina HTML</h2>
        <h3><?php echo "Inline CSS"; ?></h3>
        <pre>
&lt;p style="color: red;"&gt;Testo rosso.&lt;/p&gt;
        </pre>
        <h3><?php echo "Internal CSS"; ?></h3>
        <pre>
&lt;style&gt;
    p {
        color: blue;
    }
&lt;/style&gt;
&lt;p&gt;Testo blu.&lt;/p&gt;
        </pre>
        <h3><?php echo "External CSS"; ?></h3>
        <pre>
&lt;link rel="stylesheet" href="style.css"&gt;
        </pre>
        <h2>2. Selettori CSS</h2>
        <h3><?php echo "Selettore Universale"; ?></h3>
        <pre>
* {
    margin: 0;
    padding: 0;
}
        </pre>
        <h3><?php echo "Selettore per Tag"; ?></h3>
        <pre>
h1 {
    color: green;
}
        </pre>
        <h3><?php echo "Selettore per Classe"; ?></h3>
        <pre>
.my-class {
    font-size: 16px;
}
        </pre>
    </main>
    <footer>
        <a href="index.php"><?php echo "Torna al Sommario"; ?></a>
    </footer>
</body>
</html>
