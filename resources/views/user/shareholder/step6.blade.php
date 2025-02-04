@extends('layouts.master')
@section('content')

<div class="bg-white rounded-lg shadow-lg p-6 md:p-10 min-w-full mx-auto">
    @include('user.shareholder.contents')
    <div class="container mx-auto p-6">
    <form method="POST" action="{{ route('shareholder.stores') }}">
        @csrf
        <input type="hidden" name="step" value="step6">
        <!-- Step 1: Company Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="accno" class="block mb-2 text-sm font-medium text-gray-900">Account
                                No:</label>
                            <input type="text" name="accno" id="accno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" value="{{ old('accno', $userdetail->accno ?? '') }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="bankname" class="block mb-2 text-sm font-medium text-gray-900">Bank
                                Name</label>
                            <input type="text" name="bankname" id="bankname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" value="{{ old('bankname', $userdetail->bankname ?? '') }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="bankbranch" class="block mb-2 text-sm font-medium text-gray-900">Branch</label>
                            <input type="text" name="bankbranch" id="bankbranch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" value="{{ old('bankbranch', $userdetail->bankbranch ?? '') }}" required>
                        </div>
                    </div>
 <!-- Button Section -->
 <div class="flex justify-between mt-6">
    <a href="{{ route('user.shareholder.step5') }}"
        class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
    <button type="submit"
        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Submit</button>
</div>
    </form>
</div>
</div>
@endsection
