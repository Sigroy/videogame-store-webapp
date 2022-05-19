<h1 class="text-center mt-10 font-bold text-2xl uppercase">Carrito de la compra</h1>

<?php if (isset($_SESSION['carrito'])): ?>
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
                <th class="border-r-2 border-b-4">Eliminar</th>
            </tr>
            <?php foreach ($carrito as $indice => $elemento):
                $producto = $elemento['producto'];
                ?>
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
                        <a href="<?= BASE_URL ?>/carrito/aumentar&indice=<?= $indice ?>" class="text-xl text-green-400">+</a>
                        <?= $elemento['unidades'] ?>
                        <a href="<?= BASE_URL ?>/carrito/disminuir&indice=<?= $indice ?>" class="text-xl text-red-500">-</a>
                    </td>
                    <td class="border-r-2">
                        <a href="<?= BASE_URL ?>/carrito/limpiar&indice=<?= $indice ?>"
                           class="mx-5 p-5 border inline-block bg-red-600 py-2 text-white rounded-md w-58 cursor-pointer hover:bg-red-800">
                            Eliminar producto
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php $estadisticas = Utils::estadisticasCarrito(); ?>
    <div class="flex justify-end w-full items-center">
        <h2 class="mx-5 mt-5 mb-6 text-xl text-left font-bold mr-28">Precio total: $<?= $estadisticas['total']; ?></h2>

        <a href="<?= BASE_URL ?>/pedido/hacer"
           class="mx-5 p-5 border inline-block bg-indigo-600 py-2 hover:bg-indigo-700 text-white rounded-md w-58 cursor-pointer hover:bg-blue-800">
            Continuar con el pedido
        </a>
    </div>
    <div class="flex justify-start w-full items-center">
        <a href="<?= BASE_URL ?>/carrito/eliminarTodo"
           class="mx-5 p-5 border inline-block bg-red-600 py-2 text-white rounded-md w-58 cursor-pointer hover:bg-red-800">
            Vaciar el carrito
        </a>
    </div>

<?php else: ?>
    <h1 class="text-center mt-10 font-bold text-2xl uppercase">El carrito está vacío, añade algún producto</h1>

<?php endif; ?>