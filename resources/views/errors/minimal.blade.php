<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;400;700&display=swap');

        html, body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="text-center">
    <!-- Animated Title -->
    <h1 class="text-4xl md:text-6xl font-bold text-gray-800 animate-fade-in-down">
        @yield('message')
    </h1>
    <!-- Subtext with Animation -->
    <p class="mt-4 text-lg text-gray-600 animate-fade-in-up">
        Our site is currently undergoing updates. We'll be back soon!
    </p>

    <!-- Animated Button -->
    <a href="/"
       class="mt-6 inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300 animate-bounce">
        Home back
    </a>
</div>

<!-- Tailwind Animations -->
<style>
    @keyframes fade-in-down {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-down {
        animation: fade-in-down 1s ease-out;
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out;
        animation-delay: 0.5s;
    }
</style>
</body>
</html>
