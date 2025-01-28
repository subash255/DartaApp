<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Profile')</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans leading-normal">

    <div class="flex h-full">
        @if(Auth::user()->status=='approved')
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-gray-200 text-gray-900 shadow-lg flex flex-col fixed top-0 bottom-0 left-0 transition-all duration-300 overflow-y-auto z-10">
            <div class="p-4 flex items-center justify-center">
                <!-- Logo/Brand Name -->
                <div class="w-40 h-40 rounded-full border-2 border-gray-500 object-contain text-3xl font-bold">
                    <span class="flex flex-col items-center justify-center h-full">Darta <br> <span class="text-orange-600">App</span></span>
                </div>
            </div>
            
            <nav class="mt-6">
                <!-- Dashboard Link -->
                <a href="{{ route('user.index') }}" class="sidebar-link flex items-center px-6 py-4 {{ request()->routeIs('user.index') ? 'bg-orange-600 text-white' : 'hover:bg-orange-500 hover:text-white' }} transition-colors duration-200">
                    <i class="ri-home-4-line"></i> <!-- Updated icon -->
                    <span class="ml-4 font-bold">Dashboard</span>
                </a>

                <!-- Your Details Link -->
                <a href="{{route('user.userdetail')}}" class="sidebar-link flex items-center px-6 py-4 {{ request()->routeIs('user.userdetail') ? 'bg-orange-600 text-white' : 'hover:bg-orange-500 hover:text-white' }} transition-colors duration-200">
                    <i class="ri-user-2-line"></i> <!-- Updated icon -->
                    <span class="ml-4 font-bold">Your Details</span>
                </a>

                <!-- Company Details Link -->
                <a href="{{route('user.companydetail')}}" class="sidebar-link flex items-center px-6 py-4 {{ request()->routeIs('user.companydetail') ? 'bg-orange-600 text-white' : 'hover:bg-orange-500 hover:text-white' }} transition-colors duration-200">
                    <i class="ri-building-line"></i> <!-- Updated icon -->
                    <span class="ml-4 font-bold">Company Details</span>
                </a>

                <!-- Share Amount Link -->
                <a href="#" class="sidebar-link flex items-center px-6 py-4 {{ request()->routeIs('user.share.index') ? 'bg-orange-600 text-white' : 'hover:bg-orange-500 hover:text-white' }} transition-colors duration-200">
                    <i class="ri-wallet-2-line"></i> <!-- Updated icon -->
                    <span class="ml-4 font-bold">Share Amount</span>
                </a>

                <!-- Notification Link -->
                <a href="#" class="sidebar-link flex items-center px-6 py-4 {{ request()->routeIs('user.notifications.index') ? 'bg-orange-600 text-white' : 'hover:bg-orange-500 hover:text-white' }} transition-colors duration-200">
                    <i class="ri-notification-3-line"></i> <!-- Updated icon -->
                    <span class="ml-4 font-bold">Notification</span>
                </a>

                <!-- Log Out -->
                <div class="px-6 py-4">
                    <form action="{{ route('logout') }}" method="POST" class="w-full font-bold">
                        @csrf
                        <button type="submit" class="w-full text-left text-red-500 hover:bg-orange-500 hover:text-white px-4 py-2 transition-colors duration-200">
                            <i class="ri-logout-box-line"></i> Log Out
                        </button>
                    </form>
                </div>
            </nav>
        </aside>
        @endif

        <!-- Main Content Area -->
        <main class="ml-72 px-6 w-full">
            <div class="pb-6 mt-8">
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>
