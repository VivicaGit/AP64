<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sanación / Entrenamiento</title>
</head>
<body>
    <h2>Sanar o Entrenar Criatura</h2>
    
    <?php if ($criatura): ?>
        <form action="index.php?accion=editar&nombre=<?= urlencode($criatura->getNombre()) ?>" method="POST">
            
            <p><strong>Criatura:</strong> <?= $criatura->getNombre() ?> (<?= $criatura->getEspecie() ?>)</p>
            
            <label>Nuevo Nivel de Peligrosidad (1-10):</label><br>
            <input type="number" name="peligrosidad" min="1" max="10" value="<?= $criatura->getNivelPeligro() ?>" required><br><br>

            <label>Nuevo Estado de Salud:</label><br>
            <input type="text" name="salud" value="<?= $criatura->getSalud() ?>" required><br><br>

            <button type="submit">Actualizar Estado</button>
        </form>
    <?php else: ?>
        <p>Criatura no encontrada.</p>
    <?php endif; ?>

    <br>
    <a href="index.php">Volver al Censo</a>
</body>
</html>