<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sommario del Quaderno</title>
</head>
<body>
    <header>
        <h1><?php echo "Quaderno di Informatica"; ?></h1>
        <p><?php echo "Esplora i concetti base di HTML, CSS e altro ancora."; ?></p>
    </header>
    <main>
        <h2>Sommario</h2>
        <ul>
            <?php
                $link = [
                    "introduzione.php" => "Introduzione a HTML",
                    "css_basics.php" => "Fondamenti di CSS",
                    "javascript_intro.php" => "Introduzione a JavaScript",
                    "php_basics.php" => "Fondamenti di PHP",
                    "sql_queries.php" => "Query SQL di base"
                ];

                foreach ($link as $file => $title) {
                    echo "<li><a href='$file'>$title</a></li>";
                }
            ?>
        </ul>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Quaderno di Informatica</p>
    </footer>
</body>
</html>
