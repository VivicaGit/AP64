<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Avistamiento</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <h2>Nuevo Avistamiento</h2>
    <form action="index.php?accion=crear" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Especie:</label><br>
        <input type="text" name="especie" required><br><br>

        <label>Nivel de Peligrosidad (1-10):</label><br>
        <input type="number" name="peligrosidad" min="1" max="10" required><br><br>

        <label>Estado de Salud:</label><br>
        <input type="text" name="salud" required placeholder="Ej: Herido, Sano..."><br><br>

        <label>Tipo de Criatura:</label><br>
        <select name="tipo" id="selectorTipo" onchange="mostrarCampoExtra()" required>
            <option value="">-- Selecciona --</option>
            <option value="marina">Marina</option>
            <option value="voladora">Voladora</option>
            <option value="terrestre">Terrestre</option>
        </select><br><br>

        <div id="extra_marina" style="display:none;">
            <label>Profundidad máxima (metros):</label>
            <input type="number" name="profundidad">
        </div>

        <div id="extra_voladora" style="display:none;">
            <label>Envergadura de alas (metros):</label>
            <input type="number" name="envergadura" step="0.1" min="0">
        </div>

        <div id="extra_terrestre" style="display:none;">
            <label>Tipo de terreno (Cueva, Bosque...):</label>
            <input type="text" name="terreno">
        </div>
        <br>
        <button type="submit">Registrar Criatura</button>
    </form>
    <br>
    <a href="index.php">Volver al listado</a>

    <script>
        function mostrarCampoExtra() {
            // Ocultamos todos primero
            document.getElementById('extra_marina').style.display = 'none';
            document.getElementById('extra_voladora').style.display = 'none';
            document.getElementById('extra_terrestre').style.display = 'none';

            // Vemos qué ha elegido el usuario
            var tipo = document.getElementById('selectorTipo').value;

            // Mostramos el que toca
            if (tipo === 'marina') {
                document.getElementById('extra_marina').style.display = 'block';
            } else if (tipo === 'voladora') {
                document.getElementById('extra_voladora').style.display = 'block';
            } else if (tipo === 'terrestre') {
                document.getElementById('extra_terrestre').style.display = 'block';
            }
        }
    </script>
</body>
</html>