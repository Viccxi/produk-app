<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Product Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f0f0f] text-gray-200 flex flex-col min-h-screen">

    {{-- Header --}}
    <header class="bg-[#1a1a1a] shadow-md sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-[#ff6f61]">ProductManager</h1>
            <nav class="space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-[#ff6f61] transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-[#ff6f61] transition">Login</a>
                    <a href="{{ route('register') }}" class="bg-[#ff6f61] hover:bg-[#ff8678] text-white font-semibold px-4 py-2 rounded-lg transition">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="flex-grow flex flex-col items-center justify-center text-center px-6">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
            Manage Your <span class="text-[#ff6f61]">Products</span> Seamlessly
        </h2>
        <p class="text-gray-400 max-w-xl mb-8">
            Simplify your workflow and organize your product management efficiently with an elegant, 
            fast, and intuitive Laravel-based platform designed for professionals.
        </p>
        <div class="flex space-x-4">
            <a href="{{ route('register') }}" class="bg-[#ff6f61] hover:bg-[#ff8678] text-white font-semibold px-6 py-3 rounded-lg transition">Get Started</a>
            <a href="{{ route('login') }}" class="border border-gray-500 hover:border-[#ff6f61] hover:text-[#ff6f61] px-6 py-3 rounded-lg transition">Login</a>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-[#1a1a1a] text-gray-500 text-sm py-4 text-center border-t border-gray-800">
        © {{ date('Y') }} ProductManager by <span class="text-[#ff6f61] font-medium">Haxovica Code</span>. All rights reserved.
    </footer>

</body>
</html>
