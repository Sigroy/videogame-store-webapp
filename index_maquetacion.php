<!doctype html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/styles.css" rel="stylesheet">
    <title>Inicio</title>
</head>
<body class="h-screen">
<!-- BARRA DE NAVEGACIÓN -->
<nav class="text-white bg-gray-800 flex h-14 mx-auto px-8 items-center justify-between">
    <div class="flex">
        <div class="mr-16">
            <!--        <img src="" alt="">-->
            <span>Tienda de videojuegos</span>
        </div>
        <ul class="flex gap-4">
            <li>
                <a href="#" class="border-b-2 border-gray-200">Inicio</a>
            </li>

            <li>
                <a href="#">PlayStation 5</a>
            </li>
            <li>
                <a href="#">Xbox One</a>
            </li>
            <li>
                <a href="#">Nintendo Switch</a>
            </li>
            <li>
                <a href="#">Nintendo 3DS</a>
            </li>
        </ul>
    </div>
    <ul>
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 inline-block" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span>Carrito</span></a>
        </li>
    </ul>
</nav>

<div class="grid grid-cols-5 h-[88%]">
    <!-- BARRA LATERAL -->
    <aside class="flex flex-col px-10 border-r">
        <h2 class="mt-6 text-center text-2xl font-bold text-gray-900">Iniciar sesión</h2>
        <form action="#" method="post" class="flex flex-col justify-center text-center mt-5">
            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" required
                   class="appearance-none rounded-none relative block w-full px-3 border border-gray-300 placeholder-gray-500 text-gray-900 mb-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required
                   class="appearance-none rounded-none relative block w-full px-3 border border-gray-300 placeholder-gray-500 text-gray-900 mb-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
            <input type="submit" value="Entrar"
                   class="border bg-blue-900 text-white rounded-md w-24 self-center cursor-pointer hover:bg-blue-800">
        </form>
        <ul class="mt-5">
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 inline-block" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <a href="" class="text-blue-900 font-semibold hover:border-b hover:border-b-gray-700">
                    <span>Mis pedidos</span></a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 inline-block" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                </svg>
                <a href="" class="text-blue-900 font-semibold hover:border-b hover:border-b-gray-700"><span>Gestionar
                    categorías</span></a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 inline-block" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <a href="" class="text-blue-900 font-semibold hover:border-b hover:border-b-gray-700"><span>Gestionar
                    productos</span></a>
            </li>
        </ul>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="col-span-4">
        <h1 class="text-center mt-10 font-bold text-2xl uppercase">Productos destacados</h1>
        <div class="grid grid-cols-4 mt-5 gap-5 px-4">
            <div class="flex flex-col items-center gap-1.5">
                <img src="./assets/img/PS5%20-%20Spiderman.png" alt="Spider-Man: Miles Morales" class="h-80">
                <h2 class="font-bold mt-2">Spider-Man: Miles Morales</h2>
                <p class="font-semibold text-blue-900">$1,200</p>
                <a href=""
                   class="border bg-blue-700 text-center text-white rounded-md w-24 self-center cursor-pointer hover:bg-blue-800">Comprar</a>
            </div>
            <div class="flex flex-col items-center gap-1.5">
                <img src="./assets/img/Xbox%20-%20Red%20Dead%20Redemption%20II.png" alt="Red Dead Redemption 2"
                     class="h-80">
                <h2 class="font-bold mt-2">Red Dead Redemption 2</h2>
                <p class="font-semibold text-blue-900">$600</p>
                <a href=""
                   class="border bg-blue-700 text-center text-white rounded-md w-24 self-center cursor-pointer hover:bg-blue-800">Comprar</a>
            </div>
            <div class="flex flex-col items-center gap-1.5">
                <img src="./assets/img/Switch%20-%20The%20Legend%20of%20Zelda%20Breath%20of%20the%20Wild.png"
                     alt="The Legend of Zelda: Breath of the Wild"
                     class="h-80">
                <h2 class="font-bold mt-2 text-sm">The Legend of Zelda: Breath of the Wild</h2>
                <p class="font-semibold text-blue-900">$1,000</p>
                <a href=""
                   class="border bg-blue-700 text-center text-white rounded-md w-24 self-center cursor-pointer hover:bg-blue-800">Comprar</a>
            </div>
            <div class="flex flex-col items-center gap-1.5">
                <img src="./assets/img/3DS%20-%20Animal%20Crossing%20New%20Leaf.png" alt="Animal Crossing: New Leaf"
                     class="h-80">
                <h2 class="font-bold mt-2">Animal Crossing: New Leaf</h2>
                <p class="font-semibold text-blue-900">$500</p>
                <a href=""
                   class="border bg-blue-700 text-center text-white rounded-md w-24 self-center cursor-pointer hover:bg-blue-800">Comprar</a>
            </div>
        </div>

    </main>
</div>

<!-- PIE DE PÁGINA -->

<footer class="text-center border-t">
    <p>Desarrollado por tienda de videojuegos &copy; <?= date('Y') ?></p>
</footer>
</body>
</html>
