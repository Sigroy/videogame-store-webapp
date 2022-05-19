<!doctype html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASE_URL ?>/assets/css/styles.css" rel="stylesheet">
    <title>Inicio</title>
</head>
<body class="h-screen">
<!-- BARRA DE NAVEGACIÓN -->
<?php $categorias = Utils::mostrarCategorias(); ?>
<nav class="text-white bg-gray-800 flex h-14 mx-auto px-8 items-center justify-between">
    <div class="flex">
        <div class="mr-16">
            <!--        <img src="" alt="">-->
            <a href="<?= BASE_URL ?>">Tienda de videojuegos</a>
        </div>
        <ul class="flex gap-4">
            <li>
                <a href="<?= BASE_URL ?>"
                   class="<?php if (!isset($_GET['id_categoria'])): ?>border-b-2 <?php endif; ?>border-gray-200">Inicio</a>
            </li>
            <?php while ($cat = $categorias->fetch_object()): ?>
                <li>
                    <a href="<?= BASE_URL ?>/categoria/ver&id_categoria=<?= $cat->id_categoria ?>"
                       class="<?php if (isset($_GET['id_categoria']) && $_GET['id_categoria'] == $cat->id_categoria): ?>border-b-2 <?php endif; ?>border-gray-200"><?= $cat->nombre ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <ul>
        <li>
            <a href="<?= BASE_URL ?>/carrito/index">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 inline-block" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span>Carrito</span></a>
        </li>
    </ul>
</nav>
