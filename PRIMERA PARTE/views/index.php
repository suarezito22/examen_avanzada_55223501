<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Notas por Estudiante</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Notas de Estudiantes</h1>
    
    <h2>Registrar Nueva Nota</h2>
    <form action="index.php?action=registrar" method="POST">
        <label for="estudiante">Nombre del Estudiante:</label>
        <input type="text" id="estudiante" name="estudiante" required><br>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required><br>

        <label for="nota">Nota:</label>
        <input type="number" id="nota" name="nota" required><br>

        <input type="submit" value="Registrar">
    </form>

    <h2>Listado de Notas</h2>
    <table>
        <tr>
            <th>Estudiante</th>
            <th>Descripción</th>
            <th>Nota</th>
        </tr>
        <?php
        if (!empty($notas)) {
            foreach ($notas as $nota) {
                echo "<tr><td>{$nota['estudiante']}</td><td>{$nota['descripcion']}</td><td>{$nota['nota']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay notas registradas.</td></tr>";
        }
        ?>
    </table>

    <h3>Promedio General: <?php echo number_format($promedio, 2); ?></h3>
</body>
</html>
