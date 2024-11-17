<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Introduzione a HTML"; ?></title>
</head>
<body>
    <header>
        <h1><?php echo "Introduzione a HTML"; ?></h1>
        <p><?php echo "Scopri le basi del linguaggio HTML."; ?></p>
    </header>
    <main>
        <h2>1. La Struttura di base di un documento HTML</h2>
        <p><?php echo "Ogni file HTML segue una struttura standard. Ecco un esempio:"; ?></p>
        <pre>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;title&gt;Titolo della pagina&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Benvenuto!&lt;/h1&gt;
        &lt;p&gt;Questa e una pagina semplice.&lt;/p&gt;
    &lt;/body&gt;
&lt;/html&gt;
        </pre>
        <h2>2. Intestazioni (Headings)</h2>
        <p><?php echo "Le intestazioni servono per organizzare il contenuto. Ecco un esempio:"; ?></p>
        <pre>
&lt;h1&gt;Titolo principale&lt;/h1&gt;
&lt;h2&gt;Sottotitolo&lt;/h2&gt;
&lt;h3&gt;Sezione&lt;/h3&gt;
        </pre>
        <h2>3. Paragrafi</h2>
        <p><?php echo "I paragrafi sono definiti con il tag &lt;p&gt;. Esempio:"; ?></p>
        <pre>
&lt;p&gt;Questo e un paragrafo.&lt;/p&gt;
        </pre>
        <h2>4. Collegamenti</h2>
        <p><?php echo "Per aggiungere link usiamo il tag &lt;a&gt;:"; ?></p>
        <pre>
&lt;a href="https://www.google.com"&gt;Vai a Google&lt;/a&gt;
        </pre>
        <h2>5. Immagini</h2>
        <p><?php echo "Per aggiungere immagini usiamo il tag &lt;img&gt;:"; ?></p>
        <pre>
&lt;img src="immagine.jpg" alt="Descrizione"&gt;
        </pre>
    </main>
    <footer>
        <a href="index.php"><?php echo "Torna al Sommario"; ?></a>
    </footer>
</body>
</html>
