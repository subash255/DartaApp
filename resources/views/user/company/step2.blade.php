@extends('layouts.master')
@section('content')
<div class="container mx-auto p-6">
    <form method="POST" action="{{ route('company.stores') }}">
        @csrf
        <input type="hidden" name="step" value="step2">
        <!-- Step 2: Company Address -->
        <div class="mb-6">
            <label for="tole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
            <input type="text" name="tole" id="tole" value="{{ old('tole') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="municipality" class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
            <input type="text" name="municipality" id="municipality" value="{{ old('municipality') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
            <input type="text" name="ward" id="ward" value="{{ old('ward') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="district" class="block mb-2 text-sm font-medium text-gray-900">District</label>
            <input type="text" name="district" id="district" value="{{ old('district') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="province" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
            <input type="text" name="province" id="province" value="{{ old('province') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
    </form>
</div>
@endsection
