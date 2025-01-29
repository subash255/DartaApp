<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DartaApp Registration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-orange-50 mt-5 flex justify-center items-center relative">

    <!-- Form container with proper width and padding -->
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-4xl">
        <h2 class="text-3xl font-semibold text-center text-orange-600 mb-6">Register</h2>
        
        <form action="#" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @csrf
            <!-- First Name -->
            <div class="mb-4">
                <label for="firstname" class="block text-gray-700 font-semibold mb-2">First Name</label>
                <input type="text" id="first-name" name="firstname" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Last Name -->
            <div class="mb-4">
                <label for="lastname" class="block text-gray-700 font-semibold mb-2">Last Name</label>
                <input type="text" id="last-name" name="lastname" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Company Name -->
            <div class="mb-4">
                <label for="companyname" class="block text-gray-700 font-semibold mb-2">Company Name</label>
                <input type="text" id="company-name" name="companyname" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone</label>
                <input type="tel" id="phone" name="phone" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Type (Category) and Company Type (Two dropdowns in the same row) -->
            <div class="flex gap-6 sm:col-span-2">
                <!-- Category -->
                <div class="w-full sm:w-1/2 mb-4">
                    <label for="type" class="block text-gray-700 font-semibold mb-2">Category</label>
                    <select id="type" name="type" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="it">IT Company</option>
                        <option value="sales">Sales Company</option>
                        <option value="bank">Bank</option>
                    </select>
                </div>
                
                <!-- Company Type -->
                <div class="w-full sm:w-1/2 mb-4">
                    <label for="company_type" class="block text-gray-700 font-semibold mb-2">Company Type</label>
                    <select id="company_type" name="company_type" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="single">Single Shareholder Company</option>
                        <option value="multiple">Multi Shareholder Company</option>
                    </select>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="sm:col-span-2">
                <button type="submit" class="w-full bg-orange-600 text-white p-3 rounded-lg hover:bg-orange-700 transition duration-200">Register</button>
            </div>
        </form>
    </div>

</body>
</html>
