<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="bg-white dark:bg-gray-800 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="main.php" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">AsesoraMe</a>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="main.php" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Inicio</a>
                    <a href="asesores.php" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Asesores</a>
                </div>
            </div>
            <div class="hidden md:block">
                <?php if (isset($_SESSION['nombre_usuario'])): ?>
                    <div class="flex items-center">
                        <span class="mr-4 text-gray-700 dark:text-gray-100 font-semibold">
                            Hola, <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>
                        </span>
                        <a href="logout.php" class="cta-button bg-red-500 text-white hover:bg-red-700 px-4 py-2 rounded-md text-sm font-medium shadow-lg">
                            Cerrar Sesión
                        </a>
                    </div>
                <?php else: ?>
                    <a href="inicioSesion.html" class="cta-button bg-indigo-600 text-white hover:bg-indigo-700 px-4 py-2 rounded-md text-sm font-medium shadow-lg">Iniciar Sesión</a>
                    <a href="registro.html" class="cta-button bg-green-500 text-white hover:bg-green-600 ml-2 px-4 py-2 rounded-md text-sm font-medium shadow-lg">Registrarse</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>