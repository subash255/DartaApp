<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Profile')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans leading-normal">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="bg-orange-400 text-white w-72  ">
            <div class="flex justify-center mb-12">
                <!-- Optional Logo or App Name here -->
                <h2 class="text-2xl font-semibold text-white">Your App</h2>
            </div>

            <ul>
                <li>
                    <a href="#" class="group text-lg font-medium text-center text-white hover:text-gray-200 mb-4 block  py-2 rounded-md transition-all duration-300">
                        <span class="hover:bg-orange-500  w-full transition-all duration-300 block">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="group text-lg font-medium text-center text-white hover:text-gray-200 mb-4 block py-2 rounded-md transition-all duration-300">
                        <span class="hover:bg-orange-500  w-full transition-all duration-300 block">Address</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="group text-lg font-medium text-center text-white hover:text-gray-200 mb-4 block py-6 rounded-md transition-all duration-300">
                        <span class="hover:bg-orange-500 hover:bg-py-5  w-full transition-all duration-300 block">Bank Details</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="group text-lg font-medium text-center text-white hover:text-gray-200 mb-4 block py-2 rounded-md transition-all duration-300">
                        <span class="hover:bg-orange-500  w-full transition-all duration-300 block">Share Amount</span>
                    </a>
                </li>
                

                <li>
                    <a href="#" class="group text-lg font-medium text-center text-white hover:text-gray-200 mb-4 block py-2 rounded-md transition-all duration-300">
                        <span class="hover:bg-orange-500  w-full transition-all duration-300 block">Notification</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="group text-lg font-medium text-center text-white hover:text-gray-200 mb-4 block py-2 rounded-md transition-all duration-300">
                        <span class="hover:bg-orange-500  w-full transition-all duration-300 block">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-10">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
