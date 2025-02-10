<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Raleway:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Remove the JavaScript related to toggling the sidebar
        window.onload = function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content-container');

            // Make sure the sidebar is always in expanded state
        };

    </script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>


    <script>
        // Function to update entries based on user selection
        function updateEntries() {
            const entries = document.getElementById('entries').value; // Get selected value
            const url = new URL(window.location.href);
            url.searchParams.set('entries', entries);
            window.location.href = url;
        }

    </script>

</head>

<body class="bg-gray-100 text-gray-900 h-screen flex flex-col font-[Jost]">


    <div class="flex h-full">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white text-gray-900 flex flex-col fixed top-0 bottom-0 left-0 transition-all duration-300 overflow-y-auto z-10">
            <div class="p-4 flex items-center justify-center">
                <!-- Logo/Brand Name -->
                <div class="w-40 h-40 flex items-center justify-center overflow-hidden">
                    <!-- Logo Image -->
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-30 h-30 object-cover">
                </div>
            </div>
            
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center px-6 py-4 {{ request()->routeIs('admin.dashboard') ? 'bg-red-600 text-white' : 'hover:bg-red-500 hover:text-white' }} transition-colors duration-200">
                    <i class="ri-layout-masonry-fill"></i>
                    <span class="ml-4 font-semibold">Dashboard</span>
                </a>
                <a href="{{ route('admin.customer.index') }}" class="sidebar-link flex items-center px-6 py-4 {{ request()->routeIs('admin.customer.index') ? 'bg-red-600 text-white' : 'hover:bg-red-500 hover:text-white' }} transition-colors duration-200">
                    <i class="ri-user-fill"></i>
                    <span class="ml-4 font-semibold">Customer</span>
                </a>
                <a href="{{ route('admin.company.index') }}" class="sidebar-link flex items-center px-6 py-4 {{Str::startsWith(request()->route()->getName(), 'admin.company.step') || request()->routeIs('admin.company.index','admin.company.todo') ? 'bg-red-600 text-white' : 'hover:bg-red-500 hover:text-white' }} transition-colors duration-200">
                    <i class="ri-building-fill"></i>
                    <span class="ml-4 font-semibold">Companies</span>
                </a>
                <a href="{{ route('admin.shareholder.index') }}" class="sidebar-link flex items-center px-6 py-4 {{ request()->routeIs('admin.shareholder.index','admin.shareholder.view') ? 'bg-red-600 text-white' : 'hover:bg-red-500 hover:text-white' }} transition-colors duration-200">
                    <i class="ri-wallet-2-fill"></i>
                    <span class="ml-4 font-semibold">Shareholders</span>
                </a>
                <a href="{{ route('admin.category.index') }}" class="sidebar-link flex items-center px-6 py-4 {{ request()->routeIs('admin.category.index') ? 'bg-red-600 text-white' : 'hover:bg-red-500 hover:text-white' }} transition-colors duration-200">
                    <i class="ri-apps-2-fill"></i>
                    <span class="ml-4 font-semibold">Categories</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-1 overflow-hidden">
            <main class="ml-64 w-full overflow-x-hidden">
            <!-- Header Section -->
            <div class="w-full bg-red-600 text-white flex items-center justify-between px-4 py-14 shadow-lg">
                <h1 class="text-xl font-semibold">{{ $title ?? 'Default Title' }}</h1>
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <div class="flex items-center text-lg font-medium hover:text-white focus:outline-none cursor-pointer">
                            <!-- Display the logged-in user's name -->
                            <span>{{ Auth::user()->firstname }}</span>
                            <i class="ri-arrow-down-s-line text-white"></i>
                        </div>

                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 w-40 bg-white text-gray-800 rounded-md shadow-lg hidden group-hover:block z-[50]">
                            <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
                            <form action="{{ route('logout') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>

                    <div>
                        <button class="hover:bg-red-500 transition ease-in-out duration-200">
                            <i class="ri-moon-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="pb-6">
                @yield('content')
            </div>
        </main>
        </div>
    </div>

</body>

</html>
