<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AsesoraMe - Tu Plataforma de Asesorías Personalizadas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .cta-button { transition: all 0.3s ease; }
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">

    <!-- El header dinámico ya fue incluido arriba -->

    <!-- Hero Section -->
    <header class="hero-bg text-white">
        <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight">
                <span class="block">Alcanza tu máximo potencial.</span>
                <span class="block text-indigo-200">Asesorías personalizadas a tu alcance.</span>
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-lg sm:text-xl text-indigo-100">
                Conecta con asesores expertos en cientos de materias. Aprende a tu ritmo, de forma virtual o presencial.
            </p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="asesores.php" class="cta-button inline-block bg-white text-indigo-600 hover:bg-indigo-50 px-8 py-3 rounded-md text-base font-semibold shadow-lg">
                    Buscar un Asesor
                </a>
                <a href="registroAsesor.html" class="cta-button inline-block bg-indigo-500 text-white hover:bg-indigo-400 px-8 py-3 rounded-md text-base font-semibold shadow-lg">
                    Conviértete en Asesor
                </a>
            </div>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">¿Cómo funciona AsesoraMe?</h2>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400">
                    Aprender nunca fue tan fácil. Sigue estos simples pasos.
                </p>
            </div>
            <div class="mt-12 grid gap-10 md:grid-cols-3">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300 mx-auto">
                        <i data-feather="search" class="h-8 w-8"></i>
                    </div>
                    <h3 class="mt-5 text-lg font-medium text-gray-900 dark:text-white">1. Encuentra tu Asesor</h3>
                    <p class="mt-2 text-base text-gray-500 dark:text-gray-400">
                        Usa nuestros filtros avanzados para encontrar al experto ideal por materia, ubicación y horario.
                    </p>
                </div>
                <!-- Step 2 -->
                <div class="text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300 mx-auto">
                        <i data-feather="calendar" class="h-8 w-8"></i>
                    </div>
                    <h3 class="mt-5 text-lg font-medium text-gray-900 dark:text-white">2. Agenda tu Sesión</h3>
                    <p class="mt-2 text-base text-gray-500 dark:text-gray-400">
                        Elige la modalidad (virtual o presencial) y reserva en el horario que más te convenga. ¡Paga de forma segura!
                    </p>
                </div>
                <!-- Step 3 -->
                <div class="text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300 mx-auto">
                        <i data-feather="award" class="h-8 w-8"></i>
                    </div>
                    <h3 class="mt-5 text-lg font-medium text-gray-900 dark:text-white">3. Empieza a Aprender</h3>
                    <p class="mt-2 text-base text-gray-500 dark:text-gray-400">
                        Conéctate a tu sesión virtual con pizarra interactiva o acude a tu cita. ¡Califica y deja tu feedback!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Tutors Section -->
    <section id="tutors" class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Conoce a nuestros Asesores Destacados</h2>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400">
                    Profesionales verificados y con excelentes valoraciones listos para ayudarte.
                </p>
            </div>
            <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Tutor Card 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <img class="h-56 w-full object-cover" src="https://placehold.co/400x300/667eea/ffffff?text=Ana+García" alt="Foto de Ana García">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Ana García</h3>
                        <p class="text-indigo-600 dark:text-indigo-400 font-medium">Física y Cálculo Avanzado</p>
                        <div class="flex items-center mt-3">
                            <div class="flex text-yellow-400">
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                            </div>
                            <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">5.0 (42 valoraciones)</span>
                        </div>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm">Doctora en Física Teórica con 10 años de experiencia en docencia universitaria. Apasionada por hacer la ciencia accesible para todos.</p>
                        <a href="#" class="mt-6 block text-center w-full bg-indigo-600 text-white py-2 rounded-md font-semibold hover:bg-indigo-700 transition-colors">Ver Perfil</a>
                    </div>
                </div>
                <!-- Tutor Card 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <img class="h-56 w-full object-cover" src="https://placehold.co/400x300/764ba2/ffffff?text=Carlos+Ruiz" alt="Foto de Carlos Ruiz">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Carlos Ruiz</h3>
                        <p class="text-indigo-600 dark:text-indigo-400 font-medium">Programación y Desarrollo Web</p>
                        <div class="flex items-center mt-3">
                            <div class="flex text-yellow-400">
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 text-gray-300 fill-current"></i>
                            </div>
                            <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">4.8 (31 valoraciones)</span>
                        </div>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm">Ingeniero de Software Senior con experiencia en startups. Especialista en Python, JavaScript y React.</p>
                        <a href="#" class="mt-6 block text-center w-full bg-indigo-600 text-white py-2 rounded-md font-semibold hover:bg-indigo-700 transition-colors">Ver Perfil</a>
                    </div>
                </div>
                <!-- Tutor Card 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <img class="h-56 w-full object-cover" src="https://placehold.co/400x300/38a169/ffffff?text=Laura+Vera" alt="Foto de Laura Vera">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Laura Vera</h3>
                        <p class="text-indigo-600 dark:text-indigo-400 font-medium">Inglés de Negocios y TOEFL</p>
                        <div class="flex items-center mt-3">
                            <div class="flex text-yellow-400">
                               <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                                <i data-feather="star" class="h-5 w-5 fill-current"></i>
                            </div>
                            <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">5.0 (55 valoraciones)</span>
                        </div>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm">Traductora certificada con MBA internacional. Ayudo a profesionales a ganar fluidez y confianza para el mundo corporativo.</p>
                        <a href="#" class="mt-6 block text-center w-full bg-indigo-600 text-white py-2 rounded-md font-semibold hover:bg-indigo-700 transition-colors">Ver Perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 tracking-wider uppercase">Soluciones</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Para Estudiantes</a></li>
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Para Profesionales</a></li>
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Para Empresas</a></li>
                    </ul>
                </div>
                 <div>
                    <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 tracking-wider uppercase">Soporte</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Centro de Ayuda</a></li>
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Contacto</a></li>
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Términos y Servicios</a></li>
                    </ul>
                </div>
                 <div>
                    <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 tracking-wider uppercase">Compañía</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Sobre Nosotros</a></li>
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Carreras</a></li>
                    </ul>
                </div>
                 <div>
                    <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 tracking-wider uppercase">Legal</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Privacidad</a></li>
                        <li><a href="#" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Cookies</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-8 md:flex md:items-center md:justify-between">
                <div class="flex space-x-6 md:order-2">
                    <a href="#" class="text-gray-400 hover:text-gray-500"><span class="sr-only">Facebook</span><i data-feather="facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-gray-500"><span class="sr-only">Instagram</span><i data-feather="instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-gray-500"><span class="sr-only">Twitter</span><i data-feather="twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-gray-500"><span class="sr-only">LinkedIn</span><i data-feather="linkedin"></i></a>
                </div>
                <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">&copy; 2025 AsesoraMe. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

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