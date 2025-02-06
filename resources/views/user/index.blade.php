@if($user->status == 'approved')
    @extends('layouts.master')
    @section('content')

     <!-- User Info Section -->
     <div class="flex flex-col md:flex-row items-center justify-between mt-16 mb-8 space-y-4 md:space-y-0">
        <!-- Profile Info -->
        <div class="text-center md:text-left">
            <h2 class="text-2xl font-semibold text-orange-700">Welcome, {{$user->firstname}} {{$user->lastname}}</h2>
            <p class="text-gray-600 text-lg">{{$user->email}}</p>
            <p class="text-gray-500 text-sm mt-2">Member since: {{$user->created_at}}</p>
        </div>

        <!-- Edit Button -->
        <a href="{{route('user.edit')}}" class="inline-block px-6 py-2 bg-orange-500 text-white text-lg font-semibold rounded-md hover:bg-orange-600 transition duration-300 ease-in-out">
            Edit Profile
        </a>
    </div>

    <div class="grid md:grid-cols-2 gap-8 mt-16 mb-8">
        <!-- User Info Card -->
        <div class="bg-white rounded-lg p-6 shadow-lg border-t-4 border-b-4 border-orange-600">
            <h3 class="text-xl font-semibold text-gray-800 mb-6">User Information</h3>
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
                    <span class="text-gray-600 font-medium">Company Name:</span>
                    <span class="text-gray-800">{{$user->companyname}}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 font-medium">Company Category:</span>
                    <span class="text-gray-800">{{$user->category->name}}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 font-medium">Company Type:</span>
                    <span class="text-gray-800">{{$user->type}}</span>
                </div>
                @if($user->type == 'multiple')
                <div class="flex justify-between">
                    <span class="text-gray-600 font-medium">Total Shareholders:</span>
                    <span class="text-gray-800">{{$totalshareholders}}</span>
                </div>
                @endif
            </div>
        </div>

        <!-- Notifications Card -->
        <div class="bg-white rounded-lg p-6 shadow-lg border-t-4 border-b-4 border-blue-600">
            <h3 class="text-xl font-semibold text-gray-800 mb-6">Todo Lists</h3>
            <div class="space-y-4">
                @if($todolist->isEmpty())
                <div class="bg-white p-2 border-b border-gray-300">
                    <h4 class="text-gray-800 font-semibold">No Todo List</h4>
                    <p class="text-gray-800">You have no pending tasks.</p>
                </div>
                    
                @endif
                @foreach($todolist as $todo)
                <div class="bg-white p-2 border-b border-gray-300">
                    <h4 class="text-gray-800 font-semibold">{{$todo->title}}</h4>
                    <p class="text-gray-800">{{$todo->description}}</p>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @endsection

@elseif($user->status == 'rejected')
    <!-- Rejected Status Message in a Centered Box -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100 px-4">
        <div class="bg-white p-8 w-full max-w-lg border-r-4 border-l-4 border-red-600 text-red-800 shadow-lg rounded-lg">
            <div class="text-center">
                <strong class="text-2xl font-semibold">Your account has been rejected.</strong>
                <p class="mt-2 text-sm">If you believe this is a mistake, please contact support for assistance.</p>
            </div>
            <div class="mt-10 flex justify-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

@elseif($user->status == 'new')
    <!-- New Account Status Message in a Centered Box -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100 px-4">
        <div class="bg-white p-8 w-full max-w-lg border-r-4 border-l-4 border-yellow-600 text-yellow-800 shadow-lg rounded-lg">
            <div class="text-center">
                <strong class="text-2xl font-semibold">Your account is under review.</strong>
                <p class="mt-2 text-sm">Please wait for confirmation from the team.</p>
            </div>
            <div class="mt-10 flex justify-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
@endif
