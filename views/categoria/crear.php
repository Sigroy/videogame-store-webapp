<h1>Crear nueva categoría</h1>

<form action="<?=BASE_URL?>/categoria/guardar" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <input type="submit" value="Guardar">
</form>
