<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'exitoso'): ?>
    <h1 class="mt-5 text-center font-bold text-3xl text-green-500">Tu producto ha sido confirmado</h1>

    <?php if ($pedido): ?>
        <div class="px-6">
            <h2 class="mt-5 font-semibold text-2xl ">Datos del pedido:</h2>

            <span class="font-semibold">Número de pedido</span>: <?= $pedido->id_pedido ?> <br>
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
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'confirmado'): ?>
    <h1 class="mt-5 text-center font-bold text-3xl text-red-500">Tu producto no ha podido procesarse</h1>
<?php endif; ?>
