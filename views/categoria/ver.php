<?php if (isset($categoria)): ?>
    <h1 class="text-center mt-10 font-bold text-2xl uppercase">Juegos de <?= $categoria->nombre ?></h1>
    <?php if ($productos->num_rows == 0): ?>
        <p class="text-center mt-12">No hay juegos para <?= $categoria->nombre ?></p>
    <?php else: ?>
        <div class="grid grid-cols-4 mt-5 gap-5 px-4">
            <?php while ($producto = $productos->fetch_object()): ?>
                <div class="flex flex-col items-center gap-1.5">
                    <a href="<?= BASE_URL ?>/producto/ver&id_producto=<?= $producto->id_producto ?>">
                        <img src="<?= BASE_URL ?>/uploads/images/<?= $producto->imagen ?>"
                             alt="<?= $producto->nombre ?>"
                             class="h-80">
                        <h2 class="font-bold mt-2 text-center"><?= $producto->nombre ?></h2>
                    </a>
                    <p class="font-semibold text-blue-900">$<?= $producto->precio ?></p>
                    <a href="<?= BASE_URL ?>/carrito/agregar&id_producto=<?= $producto->id_producto ?>"
                       class="border bg-blue-700 text-center text-white rounded-md w-24 self-center cursor-pointer hover:bg-blue-800">Comprar</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php else: ?>
    <h1 class="text-center mt-10 font-bold text-2xl uppercase">Esa plataforma no existe</h1>
<?php endif; ?>
