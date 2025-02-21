@extends('layouts.master')
@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-10 min-w-full mx-auto">

        @include('user.shareholder.contents')
        <div class="container mx-auto p-6">
            <form method="POST" action="{{$userDetail ? route('user.shareholder.step1.update', $userDetail->id) : route('user.shareholder.step1.store')}}">
                @csrf
                @if($userDetail)
                    @method('PUT')

                @endif
                <input type="hidden" name="step" value="step1">
                <!-- Step 1: Company Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="mb-6">
                        <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900">Firstname</label>
                        <input type="text" name="firstname" id="firstname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('firstname', $userDetail->firstname ?? '') }}" required>
                            @error('firstname')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900">Lastname</label>
                        <input type="text" name="lastname" id="lastname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('lastname', $userDetail->lastname ?? '') }}" required>
                            @error('lastname')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Witness
                            Name</label>
                        <input type="text" name="wname" id="wname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('wname', $userDetail->wname ?? '') }}" required>
                            @error('wname')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Witness
                            Address</label>
                        <input type="text" name="waddress" id="waddress"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('waddress', $userDetail->waddress ?? '') }}" required>
                            @error('waddress')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                </div>
                <button type="submit"
                    class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
            </form>
        </div>
    </div>
@endsection
