<?php if (isset($pro)): ?>
    <h1 class="text-center mt-10 font-bold text-2xl uppercase"><?= $pro->nombre ?></h1>

    <div class="grid grid-cols-2 justify-center gap-1.5 mt-16 px-48">
        <div>
            <img src="<?= BASE_URL ?>/uploads/images/<?= $pro->imagen ?>" alt="<?= $pro->nombre ?>"
                 class="h-80">
        </div>
        <div class="flex flex-col align-center">
            <p class="text-l text-center font-medium justify-self-center mb-3"><?= $pro->descripcion ?></p>
            <p class="font-semibold text-blue-900 text-xl mb-2.5 justify-self-center text-center">
                $<?= $pro->precio ?></p>
            <a href="<?= BASE_URL ?>/carrito/agregar&id_producto=<?= $pro->id_producto ?>"
               class="border bg-blue-700 inline-block text-center text-white rounded-md w-24 self-center cursor-pointer text-center hover:bg-blue-800">Comprar</a>
        </div>
    </div>
<?php else: ?>
    <h1 class="text-center mt-10 font-bold text-2xl uppercase">El producto no existe.</h1>
<?php endif; ?>
