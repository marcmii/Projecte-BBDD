<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sucursales de SEMIC</title>
    <link rel="stylesheet" href="../css/graus.css">
</head>
<body>
<?php
$conn = new mysqli("localhost", "root", "", "projecte_marc_jofre");

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Definir la empresa a mostrar (empresa con ID 1 en este caso)
$empresaId = '006'; // Especificamos el ID de la empresa directamente aquí

// Obtener nombre de la empresa
$stmt_empresa = $conn->prepare("SELECT Name FROM Companies WHERE Id = ?");
$stmt_empresa->bind_param("s", $empresaId);
$stmt_empresa->execute();
$result_empresa = $stmt_empresa->get_result();

if ($result_empresa->num_rows === 0) {
    echo "<h2>Empresa no encontrada</h2>";
    exit;
}

$empresa = $result_empresa->fetch_assoc();
echo "<h1>Sucursals de " . htmlspecialchars($empresa['Name']) . "</h1>";

// Obtener sucursales de esa empresa
$stmt_sucursales = $conn->prepare("SELECT Address, Zipcode, City, Province FROM Branches WHERE Id = ?");
$stmt_sucursales->bind_param("s", $empresaId);
$stmt_sucursales->execute();
$result_sucursales = $stmt_sucursales->get_result();

if ($result_sucursales->num_rows === 0) {
    echo "<p>No se encontraron sucursales para esta empresa.</p>";
} else {
    $num = 1;
    while ($sucursal = $result_sucursales->fetch_assoc()) {
        echo "<div class='sucursal'>";
        echo "<h3>Sucursal $num</h3>";
        echo "<p><strong>Dirección:</strong> " . htmlspecialchars($sucursal['Address']) . "</p>";
        echo "<p><strong>Código Postal:</strong> " . htmlspecialchars($sucursal['Zipcode']) . "</p>";
        echo "<p><strong>Ciudad:</strong> " . htmlspecialchars($sucursal['City']) . "</p>";
        echo "<p><strong>Provincia:</strong> " . htmlspecialchars($sucursal['Province']) . "</p>";
        echo "</div>";
        $num++;
    }
}

$conn->close();
?>
</body>
</html>
