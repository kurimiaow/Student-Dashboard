<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ecf0fd;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl duration-500 ease-in-out transform hover:scale-[1.05]">
        <!-- Header -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-[#242639]">Create your account</h2>
            <p class="text-sm text-[#6b7598] mt-2">
                Already have an account?
                <a href="{{ route('login') }}" class="text-[#896498] hover:underline font-medium">Sign in</a>
            </p>
        </div>

        <!-- Form -->
        <form class="space-y-5" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-[#242639]">Name</label>
                <input id="name" name="name" type="text" required value="{{ old('name') }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#e6def9] focus:outline-none text-[#101512]">
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-[#242639]">Email</label>
                <input id="email" name="email" type="email" required value="{{ old('email') }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#e6def9] focus:outline-none text-[#101512]">
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-[#242639]">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#e6def9] focus:outline-none text-[#101512]">
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-[#242639]">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#e6def9] focus:outline-none text-[#101512]">
            </div>

            <!-- Submit Button -->
            <div>
                <div class="flex justify-center">
                <button type="submit"
                    class="w-36 bg-[#eebeda] text-[#101512] font-semibold py-2 px-4 rounded-lg hover:bg-[#e6def9] transition duration-300">
                    Register
                </button>
            </div>

            <!-- Terms -->
            <div class="text-center text-xs text-[#6b7598] mt-3">
                By registering, you agree to our
                <a href="#" class="text-[#896498] hover:underline">Terms of Service</a>
                and
                <a href="#" class="text-[#896498] hover:underline">Privacy Policy</a>.
            </div>
        </form>
    </div>
</body>
</html>