<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Product Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f0f0f] text-gray-200 flex flex-col min-h-screen justify-center items-center">

    {{-- Card --}}
    <div class="bg-[#1a1a1a] p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center mb-6 text-[#ff6f61]">Create Account</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-300 mb-2">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 rounded-lg bg-[#2a2a2a] text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#ff6f61]">
            </div>

            <div class="mb-4">
                <label class="block text-gray-300 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 rounded-lg bg-[#2a2a2a] text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#ff6f61]">
            </div>

            <div class="mb-4">
                <label class="block text-gray-300 mb-2">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" required
                    class="w-full px-4 py-2 rounded-lg bg-[#2a2a2a] text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#ff6f61]">
            </div>

            <div class="mb-4">
                <label class="block text-gray-300 mb-2">Jenis Kelamin</label>
                <select name="jenis_kelamin" required
                    class="w-full px-4 py-2 rounded-lg bg-[#2a2a2a] text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#ff6f61]">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-300 mb-2">Alamat</label>
                <textarea name="alamat" required
                    class="w-full px-4 py-2 rounded-lg bg-[#2a2a2a] text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#ff6f61]">{{ old('alamat') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-300 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 rounded-lg bg-[#2a2a2a] text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#ff6f61]">
            </div>

            <div class="mb-6">
                <label class="block text-gray-300 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 rounded-lg bg-[#2a2a2a] text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#ff6f61]">
            </div>

            {{-- Error messages --}}
            @if ($errors->any())
                <div class="bg-red-600 text-white text-sm p-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit"
                class="w-full bg-[#ff6f61] hover:bg-[#ff8678] text-white font-semibold py-2 rounded-lg transition">
                Register
            </button>
        </form>

        <p class="text-sm text-gray-400 text-center mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-[#ff6f61] hover:underline">Login here</a>
        </p>
    </div>

    {{-- Footer --}}
    <footer class="mt-10 text-gray-500 text-sm text-center">
        © {{ date('Y') }} <span class="text-[#ff6f61] font-medium">Haxovica Code</span>. All rights reserved.
    </footer>

</body>
</html>
