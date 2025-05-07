<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DAM</title>
    <link rel="stylesheet" href="css/graus.css">
</head>
<body>
    <h1> DAM </h1>
    <?php
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "projecte_marc_jofre");
    
    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Realizar la consulta para obtener todas las empresas con Degree_id = 1
    $result = $conn->query("SELECT * FROM Companies WHERE Degree_id = 1");

    // Verificar si se obtuvieron resultados
    if ($result && $result->num_rows > 0) {
        // Recorrer los resultados
        $empresa_num = 1; // Contador para enumerar las empresas
        while ($row = $result->fetch_assoc()) {
            // Mostrar los datos de cada empresa
            echo "<div class='empresa'>";
            echo "<h2>Empresa " . $empresa_num . "</h2>";
            echo "<p><strong>Nombre:</strong> " . htmlspecialchars($row['Name']) . "</p>";
            echo "<p><strong>Descripción:</strong> " . htmlspecialchars($row['Description']) . "</p>";
            echo "<p><strong>Logo:</strong> ";

            // Verificar si hay logo y mostrarlo
            if (!empty($row['Logo'])) {
                // Convertir la imagen en base64 para mostrarla como imagen
                echo '<br><img src="data:image/png;base64,' . base64_encode($row['Logo']) . '" width="150" />';
            } else {
                echo 'No disponible';
            }

            echo "</p>";
            echo "<p><strong>ID del grau necessitat:</strong> " . $row['Degree_id'] . "</p>";
            

        
            // Crear enlace a la página de sucursales
            $empresa_id = htmlspecialchars($row['Id']);
            $empresa_name = urlencode($row['Name']);  // Codificar el nombre para usar en el enlace
            echo "<p><a href='sucursals/sucursales_" . $empresa_name . ".php'>Ver sucursales de " . htmlspecialchars($row['Name']) . "</a></p>";
            
            $empresa_num++; // Incrementar el número de empresa
            echo "</div><br>";
        }
    } else {
        echo "<p>No se encontraron empresas.</p>";
    }

    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>
