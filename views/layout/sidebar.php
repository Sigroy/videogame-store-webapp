<div class="grid grid-cols-5 h-[88%]">
    <!-- BARRA LATERAL -->
    <aside class="flex flex-col px-10 border-r">
        <h2 class="mt-6 text-center text-2xl font-bold text-gray-900">Iniciar sesión</h2>
        <form action="#" method="post" class="flex flex-col justify-center text-center mt-5">
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
            <div class="text-sm mt-2">
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> ¿Olvidaste tu
                    contraseña? </a>
            </div>
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