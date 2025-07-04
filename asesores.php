<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesores - AsesoraMe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .cta-button {
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .cta-button:active {
            transform: translateY(0px) scale(0.98);
            box-shadow: 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .modal-backdrop {
            transition: opacity 0.3s ease;
        }
        .modal-content {
            transition: transform 0.3s ease;
        }
        .modal-body {
            max-height: 75vh;
            overflow-y: auto;
        }
        .tutor-card {
             transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .tutor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">

    <!-- Page Header -->
    <header class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold">Encuentra a tu Asesor Ideal</h1>
            <p class="mt-4 text-xl text-indigo-100">Conecta con expertos en cientos de materias</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-12">
        <!-- Tutor List Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filters -->
            <div class="mb-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:grid-cols-3">
                <div>
                    <label for="filter-specialty" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Especialidad</label>
                    <select id="filter-specialty" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="all">Todas</option>
                        <option value="Física">Física</option>
                        <option value="Programación">Programación</option>
                        <option value="Inglés">Inglés</option>
                        <option value="Historia">Historia</option>
                    </select>
                </div>
                <div>
                    <label for="filter-country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">País</label>
                    <select id="filter-country" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="all">Todos</option>
                        <option value="Perú">Perú</option>
                        <option value="México">México</option>
                        <option value="España">España</option>
                    </select>
                </div>
                <div>
                    <label for="filter-sort" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ordenar por</label>
                    <select id="filter-sort" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="rating">Mejor Calificados</option>
                        <option value="price_asc">Precio (menor a mayor)</option>
                        <option value="price_desc">Precio (mayor a menor)</option>
                    </select>
                </div>
            </div>

            <!-- Tutor Grid -->
            <div id="tutor-grid" class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Tutor cards will be inserted here by JavaScript -->
            </div>

            <!-- No Results Message -->
            <div id="no-tutors-message" class="hidden mt-12 text-center">
                <div class="max-w-md mx-auto">
                    <i data-feather="search" class="h-16 w-16 text-gray-400 mx-auto mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-500 dark:text-gray-400 mb-2">No se encontraron asesores</h3>
                    <p class="text-gray-400 dark:text-gray-500">Intenta ajustar los filtros de búsqueda</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-20">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-gray-500 dark:text-gray-400">&copy; 2025 AsesoraMe. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Tutor Detail Modal -->
    <div id="tutor-detail-modal" class="fixed inset-0 z-[60] flex items-center justify-center bg-black bg-opacity-50 modal-backdrop hidden opacity-0">
        <div class="modal-content bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-3xl m-4 transform scale-95">
             <div class="p-6 border-b dark:border-gray-700 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Perfil del Asesor</h2>
                <button id="close-tutor-detail-modal-button" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">
                    <i data-feather="x" class="h-6 w-6"></i>
                </button>
            </div>
            <div id="tutor-detail-body" class="modal-body p-6 space-y-6">
                <!-- Tutor detail content will be injected here -->
            </div>
            <div class="p-6 bg-gray-50 dark:bg-gray-800/50 rounded-b-lg flex justify-end">
                <button id="schedule-session-button" class="cta-button bg-indigo-600 text-white hover:bg-indigo-700 px-6 py-2 rounded-md font-medium shadow-lg disabled:bg-gray-400 disabled:cursor-not-allowed">
                    Agendar Sesión
                </button>
            </div>
        </div>
    </div>

    <!-- Login Modal (placeholder - you can move the complete modals from the main file) -->
    <div id="login-modal" class="fixed inset-0 z-[60] flex items-center justify-center bg-black bg-opacity-50 modal-backdrop hidden opacity-0">
        <!-- Login Modal Content - Copy from main file -->
    </div>

    <!-- Register Modal (placeholder - you can move the complete modals from the main file) -->
    <div id="register-modal" class="fixed inset-0 z-[60] flex items-center justify-center bg-black bg-opacity-50 modal-backdrop hidden opacity-0">
        <!-- Register Modal Content - Copy from main file -->
    </div>

    <script>
        feather.replace();

        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>