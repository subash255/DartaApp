@extends('layouts.master')
@section('content')

<body class="bg-orange-50 mt-5 flex justify-center items-center relative">

    <!-- Form container with proper width and padding -->
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-4xl">
        <h2 class="text-3xl font-semibold text-center text-orange-600 mb-6">Edit User Profile</h2>
        
        <form action="{{route('user.update')}}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @csrf
            @method('PATCH')
            <!-- First Name -->
            <div class="mb-4">
                <label for="firstname" class="block text-gray-700 font-semibold mb-2">First Name</label>
                <input type="text" id="first-name" name="firstname" value="{{ old('firstname', $user->firstname) }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Last Name -->
            <div class="mb-4">
                <label for="lastname" class="block text-gray-700 font-semibold mb-2">Last Name</label>
                <input type="text" id="last-name" name="lastname" value="{{ old('lastname', $user->lastname) }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Company Name in English -->
            <div class="mb-4">
                <label for="companyname" class="block text-gray-700 font-semibold mb-2">Company Name in English</label>
                <input type="text" id="company-name" name="companyname" value="{{ old('companyname', $user->companyname) }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            <!-- Company Name in Nepali -->
            <div class="mb-4">
                <label for="companyname" class="block text-gray-700 font-semibold mb-2">Company Name in Nepali</label>
                <input type="text" id="company-name" name="companyname" value="{{ old('companyname', $user->companyname) }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            
            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
                <small class="text-gray-600">Leave blank if you don't want to change your password</small>
            </div>
            
            <!-- Type (Category) and Company Type -->
            <div class="flex gap-6 sm:col-span-2">
                <!-- Category -->
                <div class="w-full sm:w-1/2 mb-4">
                    <label for="type" class="block text-gray-700 font-semibold mb-2">Category</label>
                    <select id="type" name="category" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="it" {{ old('category', $user->category) == 'it' ? 'selected' : '' }}>IT Company</option>
                        <option value="sales" {{ old('category', $user->category) == 'sales' ? 'selected' : '' }}>Sales Company</option>
                        <option value="bank" {{ old('category', $user->category) == 'bank' ? 'selected' : '' }}>Bank</option>
                    </select>
                </div>
                
                <!-- Company Type -->
                <div class="w-full sm:w-1/2 mb-4">
                    <label for="company_type" class="block text-gray-700 font-semibold mb-2">Company Type</label>
                    <select id="company_type" name="type" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="single" {{ old('type', $user->type) == 'single' ? 'selected' : '' }}>Single Shareholder Company</option>
                        <option value="multiple" {{ old('type', $user->type) == 'multiple' ? 'selected' : '' }}>Multi Shareholder Company</option>
                    </select>
                </div>
            </div>
            
<!-- Buttons Container -->
<div class="flex justify-between sm:col-span-2">
    <!-- Cancel Button -->
    <div>
        <a href="{{ route('user.index') }}" class="w-full sm:w-auto bg-gray-500 text-white p-3 rounded-lg hover:bg-gray-700 transition duration-200">Cancel</a>
    </div>
    
    <!-- Submit Button -->
    <div>
        <button type="submit" class="w-full sm:w-auto bg-orange-600 text-white p-3 rounded-lg hover:bg-orange-700 transition duration-200">Update Profile</button>
    </div>
</div>

        </form>
    </div>

</body>
@endsection
