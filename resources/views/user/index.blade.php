<!-- resources/views/profile.blade.php -->
@extends('layouts.app')

@section('title', 'user')

@section('content')
    <div class="text-center mb-12">
        <h1 class="text-3xl font-semibold text-orange-400">User Profile</h1>
        <p class="text-gray-600 mt-2">Manage your personal information and settings here.</p>
    </div>

    <!-- User Info Section -->
    <div class="flex items-center space-x-6 mb-8">
        <!-- Profile Picture -->
       
        <div>
            <h2 class="text-2xl font-semibold text-orange-800">{{$user->firstname}} {{$user->lastname}}</h2>
            <p class="text-gray-600 text-lg">{{$user->email}}</p>
            <p class="text-gray-500 text-sm mt-2">Member since: January 2021</p>
        </div>
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

    <!-- Actions -->
    <div class="mt-8 flex space-x-6 justify-center">
        <a href="#" class="inline-block px-8 py-3 bg-orange-400 text-white text-lg font-semibold rounded-md hover:bg-orange-600 transition duration-300 ease-in-out">
            Edit Profile
        </a>
        <a href="#" class="inline-block px-8 py-3 bg-red-600 text-white text-lg font-semibold rounded-md hover:bg-red-500 transition duration-300 ease-in-out">
            Log Out
        </a>
    </div>
@endsection
