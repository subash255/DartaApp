<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DartaApp Registration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen py-12 xl:px-16 lg:px-12 sm:px-8 px-4 flex items-center justify-center">
        <div class="xl:max-w-6xl w-full mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Adjusted image width to be smaller and on the left -->
                <img class="w-full h-[40rem] lg:w-[60rem] hidden lg:block object-cover" src="images/register.svg" alt="Register Image">

                <!-- Form Section - stretched to the left -->
                <div class="bg-gray-100 py-12 px-8 sm:px-16 rounded-md w-full lg:col-span-2">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold">
                            Welcome to Darta App!
                        </h1>
                        <h2 class="mt-2 text-lg">
                            Create a new account
                        </h2>
                    </div>
                    <div class="mt-6">
                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <!-- First Name -->
                                <div>
                                    <label for="firstname" class="text-base font-medium text-gray-700">First Name</label>
                                    <input type="text" name="firstname" id="firstname" placeholder="Enter your first name"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base" required>
                                </div>

                                <!-- Last Name -->
                                <div>
                                    <label for="lastname" class="text-base font-medium text-gray-700">Last Name</label>
                                    <input type="text" name="lastname" id="lastname" placeholder="Enter your last name"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base" required>
                                </div>

                                <!-- Company Name -->
                                <div>
                                    <label for="companyname" class="text-base font-medium text-gray-700">Company Name</label>
                                    <input type="text" name="companyname" id="companyname" placeholder="Enter your company name"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base" required>
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="text-base font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Enter your email address"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base" required>
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label for="phone" class="text-base font-medium text-gray-700">Phone</label>
                                    <input type="tel" name="phone" id="phone" placeholder="Enter your phone number"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base" required>
                                </div>

                                <!-- Password -->
                                <div>
                                    <label for="password" class="text-base font-medium text-gray-700">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Enter your password"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base" required>
                                </div>

                                <!-- Category and Company Type (Two dropdowns) -->
                                <div class="w-full sm:col-span-2 flex gap-6">
                                    <!-- Category -->
                                    <div class="w-full sm:w-1/2">
                                        <label for="type" class="text-base font-medium text-gray-700">Category</label>
                                        <select id="type" name="category" class="mt-2 w-full px-4 py-4 border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base" required>
                                            <option value="it">IT Company</option>
                                            <option value="sales">Sales Company</option>
                                            <option value="bank">Bank</option>
                                        </select>
                                    </div>

                                    <!-- Company Type -->
                                    <div class="w-full sm:w-1/2">
                                        <label for="company_type" class="text-base font-medium text-gray-700">Company Type</label>
                                        <select id="company_type" name="type" class="mt-2 w-full px-4 py-4 border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base" required>
                                            <option value="single">Single Shareholder Company</option>
                                            <option value="multiple">Multi Shareholder Company</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit"
                                    class="w-full py-3 bg-orange-600 text-white rounded-lg font-semibold hover:bg-orange-700 transition-colors shadow-md focus:ring-2 focus:ring-red-500">
                                    Register
                                </button>
                            </div>
                        </form>

                        <div class="flex items-center gap-x-4 mt-8">
                            <p class="border-b-2 w-full border-gray-300"></p>
                            <p class="text-quaternary text-base">OR</p>
                            <p class="border-b-2 w-full border-gray-300"></p>
                        </div>

                        <div class="mt-8 text-center">
                            <p class="text-base">Already have an account? <a href="{{ route('login') }}"
                                    class="hover:underline font-semibold text-orange-500">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
