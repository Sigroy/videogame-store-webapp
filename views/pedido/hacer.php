<?php if (isset($_SESSION['identidad'])): ?>
    <h1 class="mt-5 text-center font-bold text-3xl"> Hacer pedido </h1>
    <a href="<?= BASE_URL ?>/carrito/index" class="mt-5 text-center text-xl text-blue-900 block">Ver los productos del
        pedido</a>
    <h2 class="mt-5 text-center font-bold text-2xl"> Dirección de envío: </h2>
    <form action="<?= BASE_URL ?>/pedido/agregar" method="post" class="px-40">
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" class="block w-full" required>
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" class="block w-full" required>
        <label for="estado_entidad">Estado:</label>
        <input type="text" name="estado_entidad" id="estado_entidad" class="block w-full" required>
        <input type="submit" value="Confirmar pedido"
               class="border block mt-5 p-2 bg-blue-900 text-xl text-white rounded-md w-56 self-center cursor-pointer hover:bg-blue-800">
    </form>
<?php else: ?>
    <h1 class="mt-5 text-center font-bold text-3xl"> Necesitas iniciar sesión </h1>
    <p class="mt-5 text-center font-semibold text-xl">Necesitas tener una cuenta e iniciar sesión para hacer tu
        pedido</p>
<?php endif; ?>