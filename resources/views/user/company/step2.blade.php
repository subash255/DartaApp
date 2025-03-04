@extends('layouts.master')
@section('content')
<div class="p-4 bg-white shadow-lg mt-5 mx-4 z-20 rounded-lg">
    @include('user.company.contents')
        <div class="container mx-auto p-6">
        <form method="POST" action="{{ route('user.company.step2.update',$company->id) }}">
                @csrf
               
                    @method('PUT')
                    
              
                <input type="hidden"  value="step2">
                <!-- Step 2: Company Address -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-6">
                        <label for="tole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                        <input type="text" name="tole" id="tole" value="{{ old('tole', $company->tole ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="municipality" class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                        <input type="text" name="municipality" id="municipality"
                            value="{{ old('municipality', $company->municipality ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                        <input type="text" name="ward" id="ward" value="{{ old('ward', $company->ward ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="district" class="block mb-2 text-sm font-medium text-gray-900">District</label>
                        <input type="text" name="district" id="district"
                            value="{{ old('district', $company->district ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                        <input type="text" name="province" id="province"
                            value="{{ old('province', $company->province ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                        <input type="tel" name="phone" id="phone"
                            value="{{ old('phone', $company->phone ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="oemail" id="email"
                            value="{{ old('oemail', $company->oemail ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                </div>
               
                <!-- Button Section -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('user.company.step1') }}"
                        class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
                </div>
            </form>
            
        </div>
    </div>

@endsection
