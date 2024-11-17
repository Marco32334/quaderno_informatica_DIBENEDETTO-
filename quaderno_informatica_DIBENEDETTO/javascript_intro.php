<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Introduzione a JavaScript"; ?></title>
</head>
<body>
    <header>
        <h1><?php echo "Introduzione a JavaScript"; ?></h1>
        <p><?php echo "Scopri come aggiungere interattivita alle pagine web."; ?></p>
    </header>
    <main>
        <h2>1. Aggiungere JavaScript</h2>
        <h3><?php echo "JavaScript Inline"; ?></h3>
        <pre>
&lt;button onclick="alert('Ciao, mondo!')"&gt;Clicca qui&lt;/button&gt;
        </pre>
        <h3><?php echo "JavaScript Interno"; ?></h3>
        <pre>
&lt;script&gt;
    function saluta() {
        alert('Benvenuto in JavaScript!');
    }
&lt;/script&gt;

&lt;button onclick="saluta()"&gt;Clicca per salutare&lt;/button&gt;
        </pre>
    </main>
    <footer>
        <a href="index.php"><?php echo "Torna al Sommario"; ?></a>
    </footer>
</body>
</html>
