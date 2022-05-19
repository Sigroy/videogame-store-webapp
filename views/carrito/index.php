<h1 class="text-center mt-10 font-bold text-2xl uppercase">Carrito de la compra</h1>

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
                    <?= $elemento['unidades'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php $estadisticas = Utils::estadisticasCarrito(); ?>
<div class="flex justify-end w-full items-center">
    <h2 class="mx-5 mt-5 mb-6 text-xl text-left font-bold mr-28">Precio total: $<?= $estadisticas['total']; ?></h2>

    <a href=""
       class="mx-5 p-5 border inline-block bg-indigo-600 py-2 hover:bg-indigo-700 text-white rounded-md w-58 cursor-pointer hover:bg-blue-800">
        Continuar con el pedido
    </a>
</div>