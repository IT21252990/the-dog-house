<!DOCTYPE html>
<html lang="en" class="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Dog House</title>
        @vite('resources/css/app.css')
    </head>
    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('page-loader');
            loader.classList.add('opacity-0');
            setTimeout(() => loader.remove(), 300);
        });
    </script>
    <body class="bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950 text-gray-100 min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-gray-900/80 backdrop-blur-lg border-b border-gray-800 fixed w-full z-40 shadow-2xl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between items-center">
                    <a href="/" class="flex items-center gap-3 group">
                        <span class="text-3xl group-hover:scale-110 transition-transform">🐶</span>
                        <span class="font-bold uppercase text-xl bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                            The Dog House
                        </span>
                    </a>
                    <a href="/favorites" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-pink-600 to-red-600 hover:from-pink-500 hover:to-red-500 transition-all transform hover:scale-105 shadow-lg">
                        <span class="text-sm font-medium">My Favorites</span>
                        <span class="text-lg">❤️</span>
                    </a>
                </div>
            </div>
            
            <!-- Hero Banner -->
            <div class="w-full bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 py-1 px-4">
                <p class="text-center text-sm md:text-base max-w-4xl mx-auto text-white/90">
                    Discover adorable dog breeds, explore beautiful images, and build your personal collection of favorite pups
                </p>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 pt-32 pb-12 px-4">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full bg-gray-900/50 backdrop-blur border-t border-gray-800 mt-auto">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🐾</span>
                        <span class="text-gray-400 text-sm">© 2026 The Dog House. Powered by Dog CEO API</span>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Page Loader -->
        <div id="page-loader" class="fixed inset-0 z-50 flex items-center justify-center bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950 transition-opacity duration-300">
            <div class="flex flex-col items-center gap-4">
                <div class="animate-spin rounded-full h-16 w-16 border-4 border-indigo-500 border-t-transparent shadow-lg"></div>
                <p class="text-gray-300 text-base font-medium">Loading The Dog House...</p>
            </div>
        </div>
    </body>
</html>