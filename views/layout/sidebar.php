<div class="grid grid-cols-5 h-full">
    <!-- BARRA LATERAL -->
    <aside class="flex flex-col px-10">
        <?php if (!isset($_SESSION['identidad'])): ?>
            <h2 class="mt-6 text-center text-2xl font-bold text-gray-900">Iniciar sesión</h2>
            <form action="<?= BASE_URL ?>/usuario/login" method="post"
                  class="flex flex-col justify-center text-center mt-5">
                <input type="hidden" name="remember" value="true">
                <label for="email">Correo:</label>
                <input type="email" id="email" name="email" required
                       class="rounded-md appearance-none rounded-none relative block w-full px-3 border border-gray-300 placeholder-gray-500 text-gray-900 mb-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required
                       class="rounded-md appearance-none rounded-none relative block w-full px-3 border border-gray-300 placeholder-gray-500 text-gray-900 mb-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                <button type="submit"
                        class="border relative bg-indigo-600 py-2 hover:bg-indigo-700 text-white rounded-md w-full self-center cursor-pointer hover:bg-blue-800">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
                    Entrar
                </button>
            </form>
            <div class="text-sm mt-2 self-center">
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> ¿Olvidaste tu
                    contraseña? </a>
            </div>
            <div class="text-sm mt-2 self-center">
                <a href="<?=BASE_URL?>/usuario/registro" class="font-medium text-indigo-600 hover:text-indigo-300"> Crear una cuenta </a>
            </div>
        <?php else: ?>
            <h2 class="text-center mt-5 font-bold inline-block text-2xl"><?= $_SESSION['identidad']->nombre ?> <?= $_SESSION['identidad']->apellidos ?></h2>
        <?php endif; ?>
        <ul class="mt-5">
            <?php if (isset($_SESSION['admin'])): ?>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 inline-block" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                    </svg>
                    <a href="<?=BASE_URL?>/categoria/index" class="text-blue-900 font-semibold hover:border-b hover:border-b-gray-700"><span>Gestionar
                    categorías</span></a>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 inline-block" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                    <a href="<?=BASE_URL?>/producto/gestion" class="text-blue-900 font-semibold hover:border-b hover:border-b-gray-700"><span>Gestionar
                    productos</span></a>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 inline-block" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <a href="" class="text-blue-900 font-semibold hover:border-b hover:border-b-gray-700"><span>Gestionar
                    pedidos</span></a>
                </li>
            <?php endif; ?>

            <?php if (isset($_SESSION['identidad'])): ?>
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
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <a href="<?= BASE_URL ?>/usuario/logout"
                       class="text-blue-900 font-semibold hover:border-b hover:border-b-gray-700"><span>Cerrar sesión</span></a>
                </li>
            <?php endif; ?>
        </ul>
    </aside>
    <!-- CONTENIDO PRINCIPAL -->
    <main class="col-span-4 mb-5 border-l-2">