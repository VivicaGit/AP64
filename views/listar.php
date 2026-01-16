<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Santuario de Seres Fantásticos</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <h1>Censo de Criaturas Mitológicas</h1>
    <a href="index.php?accion=crear">Avistamiento - Registrar Nueva Criatura</a>
    
    <table border="1" cellpadding="10" style="margin-top: 20px; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Peligrosidad (1-10)</th>
                <th>Salud</th>
                <th>Atributo Especial</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($criaturas)): ?>
                <tr><td colspan="6">No hay criaturas en el refugio.</td></tr>
            <?php else: ?>
                <?php foreach ($criaturas as $criatura): ?>
                    <tr>
                        <td><?= $criatura->getNombre() ?></td>
                        <td><?= $criatura->getEspecie() ?></td>
                        
                        <td style="color: <?= $criatura->getNivelPeligro() >= 5 ? 'red' : 'green' ?>; font-weight: bold;">
                            <?= $criatura->getNivelPeligro() ?>
                        </td>
                        
                        <td><?= $criatura->getSalud() ?></td>
                        
                        <td>
                            <?php 
                            if ($criatura instanceof CriaturaMarina) {
                                echo "Profundidad: " . $criatura->getMetrosBuceo() . "m";
                            } elseif ($criatura instanceof CriaturaVoladora) {
                                echo "Envergadura: " . $criatura->getEnvergadura() . "m";
                            } elseif ($criatura instanceof CriaturaTerrestre) {
                                echo "Terreno: " . $criatura->getTipoTerreno();
                            }
                            ?>
                        </td>
                        
                        <td>
                            <a href="index.php?accion=editar&nombre=<?= urlencode($criatura->getNombre()) ?>">Sanar/Entrenar</a> | 
                            <a href="index.php?accion=eliminar&nombre=<?= urlencode($criatura->getNombre()) ?>" onclick="return confirm('¿Seguro que quieres liberar a esta criatura?');">Liberar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>