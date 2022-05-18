<h1 class="mt-5 text-center font-bold text-3xl">Gestionar categorías</h1>

<a href="<?=BASE_URL?>/categoria/crear" class="mx-5 px-4 border relative bg-indigo-600 py-2 hover:bg-indigo-700 text-white rounded-md w-full self-center cursor-pointer hover:bg-blue-800">Crear categorías</a>

<div class="w-full mt-5 flex justify-center items-center">
<table class="table-fixed border-2 w-full text-center">
    <tr>
        <th class="border-r-2 border-b-4">
            ID
        </th>
        <th class="border-b-4">
            Nombre
        </th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()): ?>
        <tr>
            <td class="border-r-2">
                <?= $cat->id_categoria; ?>
            </td>
            <td>
                <?= $cat->nombre; ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</div>
