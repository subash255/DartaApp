@extends('layouts.master')
@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-10 min-w-full mx-auto">
        @include('user.shareholder.contents')
        <div class="container mx-auto p-6">
            <form method="POST" action="{{ route('user.shareholder.step3.update', $userDetail->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="step" value="step3">
                <!-- Checkbox to auto-fill Step 2 details -->
                <div class="mb-6 flex items-center justify-start">
                    <input type="hidden" id="copystep2data_hidden" name="copystep2data" value="{{ old('copystep2data', $userDetail->copystep2data ?? 0) }}">
                
                    <input type="checkbox" id="copyStep2Data"
                        {{ old('copystep2data', $userDetail->copystep2data ?? 0) == 1 ? 'checked' : '' }}
                        class="w-4 h-4 text-gray-800 bg-gray-100 border-gray-300 focus:ring-orange-500 focus:ring-2">
                    <label for="copyStep2Data" class="ml-2 text-sm font-medium text-gray-900">Same address as citizenship?</label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="mb-6">
                        <label for="tole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                        <input type="text" name="ttole" id="ttole"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('ttole', $userDetail->ttole ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="municipality" class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                        <input type="text" name="tmunicipality" id="tmunicipality"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('tmunicipality', $userDetail->tmunicipality ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                        <input type="text" name="tward" id="tward"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('tward', $userDetail->tward ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="district" class="block mb-2 text-sm font-medium text-gray-900">District</label>
                        <input type="text" name="tdistrict" id="tdistrict"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('tdistrict', $userDetail->tdistrict ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                        <input type="text" name="tprovince" id="tprovince"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('tprovince', $userDetail->tprovince ?? '') }}" required>
                    </div>
                </div>



                <!-- Button Section -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('user.shareholder.step2',$userDetail->id) }}"
                        class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
                </div>
            </form>
        </div>
    </div>

    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const copyStep2Checkbox = document.getElementById('copyStep2Data');
            const hiddenField = document.getElementById('copystep2data_hidden');
    
            const toleField = document.getElementById('ttole');
            const municipalityField = document.getElementById('tmunicipality');
            const wardField = document.getElementById('tward');
            const provinceField = document.getElementById('tprovince');
            const districtField = document.getElementById('tdistrict');
    
            function updateFields() {
                if (copyStep2Checkbox.checked) {
                    // Set hidden input to 1
                    hiddenField.value = "1";
    
                    // Copy data from citizenship address fields
                    toleField.value = "{{ old('ctole', $userDetail->ctole ?? '') }}";
                    municipalityField.value = "{{ old('cmunicipality', $userDetail->cmunicipality ?? '') }}";
                    wardField.value = "{{ old('cward', $userDetail->cward ?? '') }}";
                    provinceField.value = "{{ old('cprovince', $userDetail->cprovince ?? '') }}";
                    districtField.value = "{{ old('cdistrict', $userDetail->cdistrict ?? '') }}";
                } else {
                    // Set hidden input to 0
                    hiddenField.value = "0";
    
                    // Clear fields
                    toleField.value = '';
                    municipalityField.value = '';
                    wardField.value = '';
                    provinceField.value = '';
                    districtField.value = '';
                }
            }
    
            // Run on page load in case the checkbox is already checked
            updateFields();
    
            // Run when checkbox is toggled
            copyStep2Checkbox.addEventListener('change', updateFields);
        });
    </script>

@endsection
