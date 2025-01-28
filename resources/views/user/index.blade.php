@if($user->status == 'approved')
    @extends('layouts.master')

    @section('content')
    
        <div class="text-center mb-12">
            <h1 class="text-3xl font-semibold text-orange-500">User Profile</h1>
            <p class="text-gray-600 mt-2">Manage your personal information and settings here.</p>
        </div>

        <!-- User Info Section -->
        <div class="flex items-center justify-between mb-8">
            <!-- Profile Info -->
            <div>
                <h2 class="text-2xl font-semibold text-orange-700">{{$user->firstname}} {{$user->lastname}}</h2>
                <p class="text-gray-600 text-lg">{{$user->email}}</p>
                <p class="text-gray-500 text-sm mt-2">Member since: {{$user->created_at}}</p>
            </div>

            <!-- Edit Button -->
            <a href="#" class="inline-block px-6 py-2 bg-orange-500 text-white text-lg font-semibold rounded-md hover:bg-orange-600 transition duration-300 ease-in-out">
                Edit Profile
            </a>
        </div>

        <!-- Information Card -->
        <div class="mt-8 bg-white rounded-lg p-6 shadow-lg border-t-4 border-orange-600">
            <h3 class="text-xl font-semibold text-gray-800 mb-6">Additional Information</h3>
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-600 font-medium">Full Name:</span>
                    <span class="text-gray-800">{{$user->firstname}} {{$user->lastname}}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 font-medium">Phone Number:</span>
                    <span class="text-gray-800">{{$user->phone}}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 font-medium">Company Name</span>
                    <span class="text-gray-800">{{$user->companyname}}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 font-medium">Company Category</span>
                    <span class="text-gray-800">{{$user->type}}</span>
                </div>
            </div>
        </div>
        @endsection
        @elseif($user->status == 'rejected')
    <!-- No layout for rejected status -->
    <div class="bg-red-100 p-4 border-l-4 border-red-500 text-red-700 mb-6">
        <strong class="text-lg">Your account has been rejected.</strong>
        <p class="mt-2">If you believe this is a mistake, please contact support.</p>
    </div>

    <!-- Logout Button -->
    <div class="text-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Logout
            </button>
        </form>
    </div>
    
@elseif($user->status == 'new')
    <!-- No layout for new status -->
    <div class="bg-yellow-100 p-4 border-l-4 border-yellow-500 text-yellow-700 mb-6">
        <strong class="text-lg">Your account is in review.</strong>
        <p class="mt-2">Please wait till the confirmation.</p>
    </div>

    <!-- Logout Button -->
    <div class="text-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Logout
            </button>
        </form>
    </div>
@endif

    

