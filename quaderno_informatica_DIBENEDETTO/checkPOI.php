<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Verifica POI</title>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position, error);
            } else {
                alert("Geolocalizzazione non supportata dal browser.");
            }
        }

        function position(pos) {
            document.getElementById("lat").value = pos.coords.latitude;
            document.getElementById("long").value = pos.coords.longitude;
        }

        function error(err) {
            switch (err.code) {
                case err.PERMISSION_DENIED:
                    alert("Accesso al servizio di localizzazione proibito.");
                    break;
                case err.POSITION_UNAVAILABLE:
                    alert("Servizio di localizzazione non disponibile.");
                    break;
                case err.TIMEOUT:
                    alert("Timeout del servizio di localizzazione.");
                    break;
                case err.UNKNOWN_ERROR:
                    alert("Errore sconosciuto nel servizio di localizzazione.");
                    break;
            }
        }
    </script>
</head>
<body onload="getLocation()">
    <h1>Verifica POI</h1>
    <form id="poiForm" method="GET" action="pagePOI.php">
        <fieldset>
            <legend>Posizione</legend>
            <input type="text" placeholder="Latitudine" id="lat" name="latitudine" required>
            <input type="text" placeholder="Longitudine" id="long" name="longitudine" required>
        </fieldset>
        <br>
        <fieldset>
            <legend>Password</legend>
            <input type="password" name="password" required>
        </fieldset>
        <br>
        <input type="submit" value="Richiedi descrizione POI">
    </form>

    <!-- Link per navigare direttamente a pagePOI.php -->
    <br>
    <a href="pagePOI.php">Vai alla pagina POI</a>
</body>
</html>
