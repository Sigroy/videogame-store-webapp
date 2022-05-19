<?php if (isset($gestion)) : ?>
    <h1 class="mt-5 text-center font-bold text-3xl">Gestionar pedidos</h1>
<?php else : ?>
    <h1 class="mt-5 text-center font-bold text-3xl">Mis pedidos</h1>
<?php endif; ?>
<div class="w-full mt-5 flex justify-center items-center">
    <table class="table-fixed border-2 w-full text-center mx-5">
        <tr>
            <th class="border-r-2 border-b-4">
                N° de pedido
            </th>
            <th class="border-r-2 border-b-4">
                Coste
            </th>
            <th class="border-r-2 border-b-4">
                Fecha
            </th>
            <th class="border-r-2 border-b-4">
                Estado
            </th>
        </tr>
        <?php while ($ped = $pedidos->fetch_object()):
            ?>
            <tr class="border-b-2">
                <td class="border-r-2 flex justify-center">
                    <a href="<?= BASE_URL ?>/pedido/detalle&id_pedido=<?= $ped->id_pedido ?>"
                       class="text-blue-500"><?= $ped->id_pedido ?></a>
                </td>
                <td class="border-r-2">
                    $<?= $ped->coste ?>
                </td>
                <td class="border-r-2">
                    <?= $ped->fecha ?>
                </td>
                <td class="border-r-2">
                    <?= Utils::mostrarEstado($ped->estado) ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>