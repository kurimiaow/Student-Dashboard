<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #ecf0fd 0%, #e6def9 100%);
      min-height: 100vh;
    }
  </style>
</head>
<body class="bg-[#ecf0fd] text-[#242639]">
  <div class="min-h-screen flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl duration-500 ease-in-out transform hover:scale-[1.05]">
      <!-- Header -->
      <div class="text-center">
        <h2 class="text-3xl font-bold text-[#181c30]">Log in to your account</h2>
        <p class="mt-2 text-sm text-[#6b7598]">
          Don't have an account?
          <a href="{{ route('register') }}" class="font-medium text-[#896498] hover:underline">Create one</a>
        </p>
      </div>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4 text-center text-green-600" :status="session('status')" />

      <!-- Login Form -->
      <form class="mt-6 space-y-6" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="space-y-4">
          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-[#242639]">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
              class="w-full mt-1 px-4 py-2 border border-gray-300 bg-white text-[#101512] placeholder-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#e6def9]" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
          </div>

          <!-- Password -->
          <div>
            <label for="password" class="block text-sm font-medium text-[#242639]">Password</label>
            <input id="password" name="password" type="password" required
              class="w-full mt-1 px-4 py-2 border border-gray-300 bg-white text-[#101512] placeholder-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#e6def9]" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
          </div>
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
          <input id="remember_me" name="remember" type="checkbox"
            class="h-4 w-4 text-[#896498] focus:ring-[#896498] border-gray-300 rounded" />
          <label for="remember_me" class="ml-2 block text-sm text-[#6b7598]">Remember me</label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-4">
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}"
              class="text-sm text-[#6b7598] hover:underline">Forgot your password?</a>
          @endif
          <button type="submit"
            class="w-32 bg-[#eebeda] text-[#181c30] px-4 py-2 rounded-lg font-semibold hover:bg-[#e6def9] transition-all duration-200">
            Log in
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>