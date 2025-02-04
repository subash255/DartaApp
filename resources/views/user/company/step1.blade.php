@extends('layouts.master')
@section('content')
<div class="container mx-auto p-6">
    <form method="POST" action="{{ route('company.stores') }}">
        @csrf
        <input type="hidden" name="step" value="step1">
        <!-- Step 1: Company Info -->
        <div class="mb-6">
            <label for="regno" class="block mb-2 text-sm font-medium text-gray-900">Registration Number</label>
            <input type="text" name="regno" id="regno" value="{{ old('regno') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="regdate" class="block mb-2 text-sm font-medium text-gray-900">Registration Date</label>
            <input type="date" name="regdate" id="regdate" value="{{ old('regdate') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="pan" class="block mb-2 text-sm font-medium text-gray-900">PAN</label>
            <input type="text" name="pan" id="pan" value="{{ old('pan') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="panregdate" class="block mb-2 text-sm font-medium text-gray-900">PAN Registration Date</label>
            <input type="date" name="panregdate" id="panregdate" value="{{ old('panregdate') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="vat" class="block mb-2 text-sm font-medium text-gray-900">VAT Number</label>
            <input type="text" name="vat" id="vat" value="{{ old('vat') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
    </form>
</div>
@endsection
