<?php
// Paràmetres de connexió a la base de dades
$host = "localhost"; // Host de la base de dades
$port = "5432"; // Port de la base de dades (normalment 5432 per PostgreSQL)
$dbname = "nom_de_la_teva_base_de_dades"; // Nom de la base de dades
$user = "usuari_de_la_base_de_dades"; // Usuari de la base de dades
$password = "contrasenya_de_la_base_de_dades"; // Contrasenya de la base de dades

// Connexió a la base de dades
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Comprova si la connexió s'ha establert correctament
if (!$conn) {
    echo "Error: No s'ha pogut connectar a la base de dades.\n";
    exit;
}

// Exemple de consulta a la base de dades
$query = "SELECT * FROM nom_de_la_taula;";
$result = pg_query($conn, $query);

// Comprova si s'ha obtingut algun resultat de la consulta
if (!$result) {
    echo "Error: No s'ha pogut executar la consulta.\n";
    exit;
}

// Processament dels resultats
echo "<h1>Dades de la taula</h1>";
echo "<ul>";
while ($row = pg_fetch_assoc($result)) {
    echo "<li>".$row['camp1']." - ".$row['camp2']."</li>"; // Canvia camp1 i camp2 pels noms dels camps de la teva taula
}
echo "</ul>";

// Allibera la memòria del resultat i tanca la connexió
pg_free_result($result);
pg_close($conn);
?>
