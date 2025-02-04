@extends('layouts.master')
@section('content')
<div class="container mx-auto p-6">
    <form method="POST" action="{{ route('company.stores') }}">
        @csrf
        <input type="hidden" name="step" value="step4">
        <!-- Step 4: OCR/IRD Login Details -->
        <div class="mb-6">
            <label for="cid" class="block mb-2 text-sm font-medium text-gray-900">ID</label>
            <input type="text" name="cid" id="cid" value="{{ old('cid') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="cpassword" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input type="password" name="cpassword" id="cpassword" value="{{ old('cpassword') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="rid" class="block mb-2 text-sm font-medium text-gray-900">RID ID</label>
            <input type="text" name="rid" id="rid" value="{{ old('rid') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="rpassword" class="block mb-2 text-sm font-medium text-gray-900">RID Password</label>
            <input type="password" name="rpassword" id="rpassword" value="{{ old('rpassword') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="remail" class="block mb-2 text-sm font-medium text-gray-900">RID Email</label>
            <input type="email" name="remail" id="remail" value="{{ old('remail') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="rphone" class="block mb-2 text-sm font-medium text-gray-900">RID Phone</label>
            <input type="tel" name="rphone" id="rphone" value="{{ old('rphone') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="rcontactperson" class="block mb-2 text-sm font-medium text-gray-900">RID Contact Person</label>
            <input type="text" name="rcontactperson" id="rcontactperson" value="{{ old('rcontactperson') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Submit</button>
    </form>
</div>
@endsection
