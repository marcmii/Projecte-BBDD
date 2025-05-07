<?php
// Paràmetres de connexió a la base de dades
$host = "localhost";
$dbname = "projecte_marc_jofre";
$user = "root";
$password = ""; // Normalment buida per defecte en XAMPP

// Connexió a la base de dades amb MySQLi
$conn = new mysqli($host, $user, $password, $dbname);

// Comprova si la connexió ha fallat
if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}

// Exemple de consulta a la base de dades
$query = "SELECT * FROM degree";
$result = $conn->query($query);

// Comprova si s'ha obtingut algun resultat
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

// Processament dels resultats
echo "<h1>Dades de la taula</h1>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>".$row['degree_id']." - ".$row['name']."</li>"; // Canvia camp1 i camp2 pels noms reals dels camps
}
echo "</ul>";

// Allibera memòria i tanca connexió
$result->free();
$conn->close();
?>
