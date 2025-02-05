<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>

<body>
    <div class="min-h-screen py-12 xl:px-16 lg:px-12 sm:px-8 px-4 flex items-center justify-center">
        <div class="xl:max-w-6xl w-full mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <img class="w-full lg:block hidden" src="images/login.svg" alt="Login Image">
                <div class="bg-gray-100 py-12 px-8 sm:px-16 rounded-md w-full">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold">
                            Welcome To CompanyDarta App!
                        </h1>
                        <h2 class="mt-2 text-lg">
                            Login to your account
                        </h2>
                    </div>
                    <div class="mt-6">
                        <form action="#" class="space-y-6" method="POST">
                            @csrf
                            <div>
                                <label for="email" class="text-base font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" placeholder="Enter email address"
                                    value=""
                                    class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                    required="">
                            </div>
                            <div>
                                <label for="password" class="text-base font-medium text-gray-700">Password</label>
                                <div class="relative">
                                    <input type="password" name="password" id="password" placeholder="Enter password"
                                        value=""
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                        required="">
                                </div>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full py-3 bg-orange-600 text-white rounded-lg font-semibold hover:bg-orange-700 transition-colors shadow-md focus:ring-2 focus:ring-red-500">
                                    Login
                                </button>
                            </div>
                        </form>
                        <div class="flex items-center gap-x-4 mt-8">
                            <p class="border-b-2 w-full border-gray-300"></p>
                            <p class="text-quaternary text-base">OR</p>
                            <p class="border-b-2 w-full border-gray-300"></p>
                        </div>

                        <div class="mt-8 text-center">
                            <p class="text-base">Don't have an account? <a href="{{ route('register') }}"
                                    class="hover:underline font-semibold text-orange-500">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
