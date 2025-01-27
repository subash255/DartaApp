@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="grid grid-cols-1 md:grid-cols-2 h-screen">
    <!-- Left Section (Image) -->
    <div class="hidden md:block bg-gray-100 p-6">
        <div class="mt-4">
            <img src="images/login.svg" alt="signin Image" class="w-full object-cover rounded-lg shadow-none">
        </div>
    </div>

    <!-- Login Form -->
    <div class="flex-1 text-black p-8 flex flex-col justify-center items-center bg-gray-200 h-full">
        <h2 class="text-3xl font-bold mb-4">DartaApp Login</h2>
        <small class="text-black text-2xl">Welcome! Please log in to continue.</small>

        <!-- Display Error Messages -->
        @if ($errors->any())
            <div class="w-full bg-red-100 text-orange-600 p-4 mb-4 rounded-lg shadow-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="w-full max-w-md mt-8 space-y-6">
            @csrf
            <!-- Email -->
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                class="w-full p-4 rounded-lg bg-white text-black focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-300 shadow-md">

            <!-- Password -->
            <input id="password" type="password" name="password" required autocomplete="current-password"
                placeholder="Password"
                class="w-full p-4 rounded-lg bg-white text-black focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-300 shadow-md">

            <!-- Forgot Password -->
            <div class="flex justify-end mt-2">
                <a href="#" class="text-orange-600 text-sm font-medium hover:underline">Forgot Password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3 bg-orange-600 text-white rounded-lg font-semibold hover:bg-orange-700 transition-colors shadow-md focus:ring-2 focus:ring-red-500">
                Login
            </button>
        </form>
    </div>
</div>
