<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DartaApp Registration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Include Nepali Transliteration Script -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/nepali-transliteration@1.0.2/dist/nepali-transliteration.min.js"></script> -->
    <script src="https://www.google.com/ime/js/1/ime.js"></script>
    {{-- Flash Message --}}
@if (session('success'))
<div id="flash-message" class="bg-green-500 text-white px-6 py-2 rounded-lg fixed top-4 right-4 shadow-lg z-50">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div id="flash-message" class="bg-red-500 text-white px-6 py-2 rounded-lg fixed top-4 right-4 shadow-lg z-50">
    {{ session('error') }}
</div>
@endif

<script>
    if (document.getElementById('flash-message')) setTimeout(() => {
        const msg = document.getElementById('flash-message');
        msg.style.opacity = 0;
        msg.style.transition = "opacity 0.5s ease-out";
        setTimeout(() => msg.remove(), 500);
    }, 3000);
</script>

</head>

<body>
    <div class="min-h-screen py-12 xl:px-16 lg:px-12 sm:px-8 px-4 flex items-center justify-center">
        <div class="xl:max-w-6xl w-full mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Adjusted image width to be smaller and on the left -->
                <img class="w-full h-[40rem] lg:w-[60rem] hidden lg:block object-cover" src="images/register.svg"
                    alt="Register Image">

                <!-- Form Section - stretched to the left -->
                <div class="bg-gray-100 py-12 px-8 sm:px-16 rounded-md w-full lg:col-span-2">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold">
                            Welcome to CompanyDarta App!
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
                                    <label for="firstname" class="text-base font-medium text-gray-700">First
                                        Name</label>
                                    <input type="text" name="firstname" id="firstname"
                                        placeholder="Enter your first name"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                        required>
                                </div>

                                <!-- Last Name -->
                                <div>
                                    <label for="lastname" class="text-base font-medium text-gray-700">Last Name</label>
                                    <input type="text" name="lastname" id="lastname"
                                        placeholder="Enter your last name"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                        required>
                                </div>

                                <!-- Company Name in English -->
                                <div class="sm:col-span-2">
                                    <label for="companyname" class="text-base font-medium text-gray-700">Purposed
                                        Company Name in English</label>
                                    <input type="text" name="companyname" id="english"
                                        placeholder="Enter your company name"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                        required>
                                </div>

                                <!-- Company Name in Nepali -->
                                <!-- 
                                    <label for="companyname_np" class="text-base font-medium text-gray-700">Purposed
                                        Company Name in Nepali</label>
                                    <input type="text" name="companyname_np" id="nepali"
                                        placeholder="Enter your company name in Nepali"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                        readonly>
                                </div> -->
                                <div class="sm:col-span-2">
                                <label for="nepaliInput" class="text-base font-medium text-gray-700">Purposed
                                        Company Name in Nepali</label>
                                <input type="text" id="nepaliInput" placeholder="Type in English..." name="companyname_np" class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base" oninput="transliterateText()" autocomplete="off">
                                </div>
                                <!-- Email -->
                                <div>
                                    <label for="email" class="text-base font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email"
                                        placeholder="Enter your email address"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                        required>
                                </div>

                                <!-- Address -->
                                <div>
                                    <label for="address" class="text-base font-medium text-gray-700">Address</label>
                                    <input type="text" name="address" id="address" placeholder="Enter your address"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                        required>
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label for="phone" class="text-base font-medium text-gray-700">Phone</label>
                                    <input type="tel" name="phone" id="phone"
                                        placeholder="Enter your phone number"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                        required>
                                </div>

                                <!-- Password -->
                                <div>
                                    <label for="password" class="text-base font-medium text-gray-700">Password</label>
                                    <input type="password" name="password" id="password"
                                        placeholder="Enter your password"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                        required>
                                </div>

                                <!-- Category and Company Type -->
                                <div class="w-full sm:col-span-2 flex gap-6">
                                    <!-- Category -->
                                    <div class="w-full sm:w-1/2">
                                        <label for="type"
                                            class="text-base font-medium text-gray-700">Category</label>

                                        <select id="type" name="category_id"
                                            class="mt-2 w-full px-4 py-4 border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                            required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Company Type -->
                                    <div class="w-full sm:w-1/2">
                                        <label for="company_type" class="text-base font-medium text-gray-700">Company
                                            Type</label>
                                        <select id="company_type" name="type"
                                            class="mt-2 w-full px-4 py-4 border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"
                                            required>
                                            <option value="single">Single Shareholder Company</option>
                                            <option value="multiple">Multi Shareholder Company</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Remarks -->
                                <div class="sm:col-span-2">
                                    <label for="remarks" class="text-base font-medium text-gray-700">Remarks</label>
                                    <textarea name="remarks" id="remarks" placeholder="Enter your remarks"
                                        class="mt-2 w-full px-4 py-4 placeholder:text-sm border border-gray-300 rounded-md shadow-sm focus:ring-0 focus:border-orange-500 sm:text-base"></textarea>
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
                            <p class="text-base">Already have an account? <a href="{{ route('welcome') }}"
                                    class="hover:underline font-semibold text-orange-500">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 
    <script>
        async function transliterateText() {
            let text = document.getElementById("english").value;
            if (!text) {
                document.getElementById("nepali").value = "";
                return;
            }

            let response = await fetch(`https://inputtools.google.com/request?text=${encodeURIComponent(text)}&itc=ne-t-i0-und&num=1`);
            let result = await response.json();
            
            if (result[0] === "SUCCESS") {
                document.getElementById("nepali").value = result[1][0][1][0]; 
            } else {
                document.getElementById("nepali").value = "Transliteration failed!";
            }
        }
    </script> -->

    <script>
        let timeout = null;

        async function transliterateText() {
            clearTimeout(timeout);

            timeout = setTimeout(async () => {
                let text = document.getElementById("nepaliInput").value;
                if (!text) return;

                try {
                    let response = await fetch(`https://inputtools.google.com/request?text=${encodeURIComponent(text)}&itc=ne-t-i0-und&num=1`);
                    let result = await response.json();

                    if (result[0] === "SUCCESS") {
                        document.getElementById("nepaliInput").value = result[1][0][1][0];
                    }
                } catch (error) {
                    console.error("Transliteration failed:", error);
                }
            }, 500); // Add a slight delay to prevent excessive API calls
        }
    </script>

</body>

</html>