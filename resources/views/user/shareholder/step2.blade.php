@extends('layouts.master')
@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-10 min-w-full mx-auto">
        @include('user.shareholder.contents')
        <div class="container mx-auto p-6">
            <form method="POST" action="{{ route('user.shareholder.step2.update', $userDetail->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
        <input type="hidden" name="step" value="step2">

                <!-- Step 1: Company Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-6">
                        <label for="tole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                        <input type="text" name="ctole" id="tole"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('ctole', $userDetail->ctole ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="municipality" class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                        <input type="text" name="cmunicipality" id="municipality"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('cmunicipality', $userDetail->cmunicipality ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                        <input type="text" name="cward" id="ward"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('cward', $userDetail->cward ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="district" class="block mb-2 text-sm font-medium text-gray-900">District</label>
                        <input type="text" name="cdistrict" id="district"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('cdistrict', $userDetail->cdistrict ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                        <input type="text" name="cprovince" id="province"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('cprovince', $userDetail->cprovince ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="CitizenshipPhoto" class="block mb-2 text-sm font-medium text-gray-900">Citizenship
                            Photo</label>
                        <input type="file" name="cimage" id="CitizenshipPhoto"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="mb-6 flex items-center justify-start">
                    <input type="hidden" id="cchanged_hidden" name="cchanged" value="{{ old('cchanged', $userDetail->cchanged ?? 0) }}">
                    <input type="checkbox" id="citizenshipChanged" 
                        class="w-4 h-4 text-gray-800 bg-gray-100 border-gray-300 focus:ring-orange-500 focus:ring-2"
                        {{ old('cchanged', $userDetail->cchanged ?? 0) == 1 ? 'checked' : '' }}>
                    <label for="citizenshipChanged" class="ml-2 text-sm font-medium text-gray-900">Citizenship Address Changed?</label>
                </div>
                
                <!-- Citizenship Address Change Form (Hidden by Default) -->
                <div id="citizenshipAddressForm" class="hidden mt-6">
                    <h2 class="text-xl font-bold mb-4">New Citizenship Address</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="newTole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                            <input type="text" name="cctole" id="newTole"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                value="{{ old('cctole', $userDetail->cctole ?? '') }}">
                        </div>
                        <div class="mb-6">
                            <label for="newMunicipality" class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                            <input type="text" name="ccmunicipality" id="newMunicipality"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                value="{{ old('ccmunicipality', $userDetail->ccmunicipality ?? '') }}">
                        </div>
                        <div class="mb-6">
                            <label for="newWard" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                            <input type="text" name="ccward" id="newWard"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                value="{{ old('ccward', $userDetail->ccward ?? '') }}">
                        </div>
                        <div class="mb-6">
                            <label for="newDistrict" class="block mb-2 text-sm font-medium text-gray-900">District</label>
                            <input type="text" name="ccdistrict" id="newDistrict"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                value="{{ old('ccdistrict', $userDetail->ccdistrict ?? '') }}">
                        </div>
                        <div class="mb-6">
                            <label for="newProvince" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                            <input type="text" name="ccprovince" id="newProvince"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                value="{{ old('ccprovince', $userDetail->ccprovince ?? '') }}">
                        </div>
                        <div class="mb-6">
                            <label for="newCitizenshipPhoto" class="block mb-2 text-sm font-medium text-gray-900">New Citizenship Photo</label>
                            <input type="file" name="ccimage" id="newCitizenshipPhoto"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                accept="image/*">
                        </div>
                    </div>
                </div>
              
                <!-- Button Section -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('user.shareholder.step1', $userDetail->id) }}"
                        class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const checkbox = document.getElementById('citizenshipChanged');
            const hiddenInput = document.getElementById('cchanged_hidden');
            const form = document.getElementById('citizenshipAddressForm');
            const inputs = form.querySelectorAll("input[type='text'], input[type='file']");
    
            function toggleForm() {
                if (checkbox.checked) {
                    form.classList.remove('hidden');
                    hiddenInput.value = "1"; // Ensure 1 is set when checked
                } else {
                    form.classList.add('hidden');
                    hiddenInput.value = "0"; // Ensure 0 is set when unchecked
                    inputs.forEach(input => input.value = ""); // Clear all input fields when unchecked
                }
            }
    
            // Run on page load in case the checkbox is already checked
            toggleForm();
    
            // Run when checkbox is toggled
            checkbox.addEventListener('change', toggleForm);
        });
    </script>
@endsection
