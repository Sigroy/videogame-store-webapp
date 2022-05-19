<h1 class="mt-5 text-center font-bold text-3xl">Gestión de productos</h1>

<a href="<?= BASE_URL ?>/producto/crear"
   class="mx-5 px-4 mt-5 w-12 border relative bg-indigo-600 py-2 hover:bg-indigo-700 text-white rounded-md w-full self-center cursor-pointer hover:bg-blue-800">Añadir
    productos</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'exitoso'): ?>
    <p class="text-green-500 text-center mb-3">El producto se ha añadido correctamente.</p>
<?php elseif (isset($_SESSION['registro']) && $_SESSION['registro'] == 'fallido'): ?>
    <p class="text-red-500 text-center mb-3">El producto no se ha añadido correctamente.</p>
<?php endif; ?>
<?php Utils::eliminarSesion('producto'); ?>

<?php if (isset($_SESSION['eliminar']) && $_SESSION['eliminar'] == 'exitoso'): ?>
    <p class="text-green-500 text-center mb-3">El producto se ha eliminado correctamente.</p>
<?php elseif (isset($_SESSION['registro']) && $_SESSION['registro'] == 'fallido'): ?>
    <p class="text-red-500 text-center mb-3">El producto no se ha eliminado correctamente.</p>
<?php endif; ?>
<?php Utils::eliminarSesion('eliminar'); ?>

<div class="w-full mt-5 flex justify-center items-center">
    <table class="table-fixed border-2 w-full text-center mx-5">
        <tr>
            <th class="border-r-2 border-b-4">
                ID
            </th>
            <th class="border-r-2 border-b-4">
                Nombre
            </th>
            <th class="border-r-2 border-b-4">
                Precio
            </th>
            <th class="border-r-2 border-b-4">
                Stock
            </th>
            <th class="border-b-4">
                Acciones
            </th>
        </tr>
        <?php while ($pro = $productos->fetch_object()): ?>
            <tr>
                <td class="border-r-2">
                    <?= $pro->id_producto; ?>
                </td>
                <td class="border-r-2">
                    <?= $pro->nombre; ?>
                </td>
                <td class="border-r-2">
                    <?= $pro->precio; ?>
                </td>
                <td class="border-r-2">
                    <?= $pro->stock; ?>
                </td>
                <td>
                    <a href="<?= BASE_URL ?>/producto/editar&id_producto=<?= $pro->id_producto ?>"
                       class="cursor-pointer text-blue-600">Editar</a>
                    <a href="<?= BASE_URL ?>/producto/eliminar&id_producto=<?= $pro->id_producto ?>"
                       class="cursor-pointer text-red-600">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
