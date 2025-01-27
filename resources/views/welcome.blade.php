<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Darta App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen px-6">
        <div class="bg-white shadow-xl rounded-lg p-10 w-full max-w-lg text-center">
            <h1 class="text-3xl font-bold text-orange-600 mb-6">
                Welcome to Darta App
            </h1>
            <p class="text-gray-600 mb-8 text-lg">
             Join us now to get started!
            </p>
            <div class="flex justify-center space-x-4">
                <a href="/login" class="inline-block px-8 py-3 bg-orange-600 text-white text-lg font-semibold rounded-md hover:bg-orange-500 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none">
                    Login
                </a>
                <a href="/register" class="inline-block px-8 py-3 bg-gray-800 text-white text-lg font-semibold rounded-md hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none">
                    Register
                </a>
            </div>
        </div>
    </div>

</body>
</html>
