<?php if (isset($editar) && isset($pro) && is_object($pro)): ?>
    <h1 class="mt-5 text-center font-bold text-3xl">Editar producto <?= $pro->nombre ?></h1>
    <?php
    $url_action = BASE_URL . "/producto/guardar&id_producto=" . $pro->id_producto;
    ?>
<?php else: ?>
    <h1 class="mt-5 text-center font-bold text-3xl">Añadir nuevo producto</h1>
    <?php
    $url_action = BASE_URL . "/producto/guardar"
    ?>
<?php endif; ?>

<form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" class="px-40">
    <label for="nombre" class="block">Nombre:</label>
    <input type="text" id="nombre" name="nombre" class="block w-full"
           value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>">

    <label for="descripcion" class="block mt-5">Descripción:</label>
    <textarea id="descripcion" name="descripcion"
              class="block w-full"><?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

    <label for="precio" class="block mt-5">Precio:</label>
    <input type="text" id="precio" name="precio" class="block w-full"
           value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">

    <label for="stock" class="block mt-5">Stock:</label>
    <input type="number" id="stock" name="stock" class="block w-full"
           value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>">

    <label for="categoria" class="block mt-5">Plataforma:</label>
    <?php $categorias = Utils::mostrarCategorias(); ?>
    <select id="categoria" name="categoria" class="block w-full">
        <?php while ($cat = $categorias->fetch_object()): ?>
            <option value="<?= $cat->id_categoria ?>" <?= isset($pro) && is_object($pro) && $cat->id_categoria === $pro->id_categoria ? 'selected' : ''; ?>>
                <?= $cat->nombre ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="imagen" class="block mt-5">Imagen:</label>
    <input type="file" id="imagen" name="imagen" class="inline-block">
    <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
        <img src="<?= BASE_URL ?>/uploads/images/<?= $pro->imagen ?>" alt="Imagen del videojuegos" class="w-16 inline-block">
    <?php endif; ?>

    <input type="submit" value="Guardar"
           class="border block mb-5 bg-blue-900 text-xl text-white rounded-md w-28 self-center cursor-pointer hover:bg-blue-800">
</form>
