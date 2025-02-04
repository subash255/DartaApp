@extends('layouts.master')
@section('content')
<div class="container mx-auto p-6">
    <form method="POST" action="{{ route('company.stores') }}">
        @csrf
        <input type="hidden" name="step" value="step3">
        <!-- Step 3: Company Bank Details -->
        <div class="mb-6">
            <label for="accno" class="block mb-2 text-sm font-medium text-gray-900">Account Number</label>
            <input type="text" name="accno" id="accno" value="{{ old('accno') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="bankname" class="block mb-2 text-sm font-medium text-gray-900">Bank Name</label>
            <input type="text" name="bankname" id="bankname" value="{{ old('bankname') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="bankbranch" class="block mb-2 text-sm font-medium text-gray-900">Bank Branch</label>
            <input type="text" name="bankbranch" id="bankbranch" value="{{ old('bankbranch') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="signature" class="block mb-2 text-sm font-medium text-gray-900">Signature</label>
            <input type="text" name="signature" id="signature" value="{{ old('signature') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="created" class="block mb-2 text-sm font-medium text-gray-900">Account Opened On</label>
            <input type="date" name="created" id="created" value="{{ old('created') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
    </form>
</div>
@endsection
