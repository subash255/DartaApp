<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Darta App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen px-6">
        <div class="bg-white shadow-xl rounded-lg p-10 w-full max-w-lg text-center">
            <!-- Optional Logo -->
            <div class="mb-6">
                <img src="your-logo-url.png" alt="Darta App Logo" class="w-32 mx-auto mb-4">
            </div>

            <h1 class="text-3xl font-bold text-orange-600 mb-6">
                Welcome to Darta App
            </h1>
            <p class="text-gray-600 mb-8 text-lg">
             Join us now to get started!
            </p>
            <div class="flex justify-center space-x-4">
                <a href="{{route('login')}}" class="inline-block px-8 py-3 bg-orange-600 text-white text-lg font-semibold rounded-md hover:bg-orange-500 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none" aria-label="Login to your account">
                    Login
                </a>
                <a href="/register" class="inline-block px-8 py-3 bg-gray-800 text-white text-lg font-semibold rounded-md hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none" aria-label="Create a new account">
                    Register
                </a>
            </div>
        </div>
    </div>

</body>
</html>
