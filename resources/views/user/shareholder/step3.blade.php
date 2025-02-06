@extends('layouts.master')
@section('content')

<div class="bg-white rounded-lg shadow-lg p-6 md:p-10 min-w-full mx-auto">
    @include('user.shareholder.contents')
    <div class="container mx-auto p-6">
    <form method="POST" action="{{ route('shareholder.stores') }}">
        @csrf
        <input type="hidden" name="step" value="step3">
        <!-- Step 1: Company Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="tole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                                <input type="text" name="ttole" id="tole"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('ttole', $userdetail->ttole ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="municipality"
                                    class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                                <input type="text" name="tmunicipality" id="municipality"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('tmunicipality', $userdetail->tmunicipality ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                                <input type="text" name="tward" id="ward"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('tward', $userdetail->tward ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="district"
                                    class="block mb-2 text-sm font-medium text-gray-900">District</label>
                                <input type="text" name="tdistrict" id="district"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('tdistrict', $userdetail->tdistrict ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="province"
                                    class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                                <input type="text" name="tprovince" id="province"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('tprovince', $userdetail->tprovince ?? '') }}" required>
                            </div>
                        </div>
 <!-- Button Section -->
 <div class="flex justify-between mt-6">
    <a href="{{ route('user.shareholder.step2') }}"
        class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
    <button type="submit"
        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
</div>
    </form>
</div>
</div>
@endsection
