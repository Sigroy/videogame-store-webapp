<h1 class="mt-5 text-center font-bold text-3xl">Detalle del pedido</h1>

<?php if (isset($pedido)): ?>
    <div class="px-6">
        <?php if (isset($_SESSION['admin'])): ?>
            <h2 class="mt-5 font-semibold text-2xl ">Cambiar estado del pedido:</h2>
            <form action="<?= BASE_URL ?>/pedido/estado" method="post">
                <input type="hidden" value="<?= $pedido->id_pedido ?>" name="id_pedido">
                <select name="estado" id="estado">
                    <option value="Confirmado" <?= $pedido->estado == "Confirmado" ? 'selected' : '' ?>>Pendiente
                    </option>
                    <option value="Preparacion" <?= $pedido->estado == "Preparacion" ? 'selected' : '' ?>>En preparación</option>
                    <option value="Listo" <?= $pedido->estado == "Listo" ? 'selected' : '' ?>>Listo para enviar</option>
                    <option value="Enviado" <?= $pedido->estado == "Enviado" ? 'selected' : '' ?>>Enviado</option>
                </select>
                <input type="submit" value="Cambiar estado" class="ml-4 cursor-pointer text-blue-600">
            </form>
        <?php endif; ?>
        <h2 class="mt-5 font-semibold text-2xl ">Datos del envío:</h2>
        <span class="font-semibold">Dirección</span>: <?= $pedido->direccion ?> <br>
        <span class="font-semibold">Ciudad</span>: <?= $pedido->ciudad ?> <br>
        <span class="font-semibold">Estado</span>: <?= $pedido->estado_entidad ?> <br>
        <h2 class="mt-5 font-semibold text-2xl ">Datos del pedido:</h2>
        <span class="font-semibold">Número de pedido</span>: <?= $pedido->id_pedido ?> <br>
        <span class="font-semibold">Estado</span>: <?= Utils::mostrarEstado($pedido->estado) ?> <br>
        <span class="font-semibold">Total a pagar</span>: $<?= $pedido->coste ?> <br>
        <span class="font-semibold mt-1.5 inline-block">Productos</span>:<br>
        <div class="w-full mt-5 flex justify-center items-center">
            <table class="table-fixed border-2 w-full text-center mx-5">
                <tr>
                    <th class="border-r-2 border-b-4">
                        Portada
                    </th>
                    <th class="border-r-2 border-b-4">
                        Nombre
                    </th>
                    <th class="border-r-2 border-b-4">
                        Precio
                    </th>
                    <th class="border-r-2 border-b-4">
                        Unidades
                    </th>
                </tr>
                <?php while ($producto = $productos->fetch_object()): ?>
                    <tr class="border-b-2">
                        <td class="border-r-2 flex justify-center">
                            <img src="<?= BASE_URL ?>/uploads/images/<?= $producto->imagen ?>"
                                 alt="Portada de <?= $producto->nombre ?>" class="h-36">
                        </td>
                        <td class="border-r-2">
                            <a href="<?= BASE_URL ?>/producto/ver&id_producto=<?= $producto->id_producto ?>"
                               class="text-blue-400 hover:text-indigo-700"><?= $producto->nombre ?></a>
                        </td>
                        <td class="border-r-2">
                            $<?= $producto->precio ?>
                        </td>
                        <td class="border-r-2">
                            <?= $producto->unidades ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
<?php endif; ?>
