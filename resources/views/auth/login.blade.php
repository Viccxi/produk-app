<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Product Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f0f0f] text-gray-200 flex flex-col min-h-screen justify-center items-center">

    {{-- Card --}}
    <div class="bg-[#1a1a1a] p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center mb-6 text-[#ff6f61]">Welcome Back</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-300 mb-2">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 rounded-lg bg-[#2a2a2a] text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#ff6f61]">
            </div>
            <div class="mb-6">
                <label class="block text-gray-300 mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 rounded-lg bg-[#2a2a2a] text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#ff6f61]">
            </div>
            <button type="submit" class="w-full bg-[#ff6f61] hover:bg-[#ff8678] text-white font-semibold py-2 rounded-lg transition">Login</button>
        </form>

        <p class="text-sm text-gray-400 text-center mt-6">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-[#ff6f61] hover:underline">Register here</a>
        </p>
    </div>

    {{-- Footer --}}
    <footer class="mt-10 text-gray-500 text-sm text-center">
        © {{ date('Y') }} <span class="text-[#ff6f61] font-medium">Haxovica Code</span>. All rights reserved.
    </footer>

</body>
</html>
