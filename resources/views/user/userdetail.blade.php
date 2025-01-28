@extends('layouts.master')
@section('content')

<div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-lg p-6 md:p-10 max-w-3xl mx-auto">
            <h1 class="text-3xl font-bold text-center mb-8">Your Details</h1>

            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex justify-between mb-2">
                    <span class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200" id="step1">
                        Address as per Citizenship
                    </span>
                    <span class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step2">
                        Current Address/ Temporary Address
                    </span>
                </div>
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-orange-200">
                    <div id="progress-bar"
                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500 w-1/3 transition-all duration-500 ease-in-out">
                    </div>
                </div>
            </div>

            <!-- Form Steps -->
            <form id="multi-step-form">
                <!-- Step 1: Address as per Citizenship -->
                <div id="step-1" class="step">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="tole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                            <input type="text" name="ctole" id="tole" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6">
                            <label for="municipality" class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                            <input type="text" name="cmunicipality" id="municipality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6">
                            <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                            <input type="number" name="cward" id="ward" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6">
                            <label for="district" class="block mb-2 text-sm font-medium text-gray-900">District</label>
                            <input type="text" name="cdistrict" id="district" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6">
                            <label for="province" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                            <input type="text" name="cprovince" id="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        </div>
                    </div>
                    
                    <!-- Citizenship Address Changed Checkbox -->
                    <div class="mb-6 flex items-center justify-start">
                        <input type="checkbox" id="citizenshipChanged" class="w-4 h-4 text-gray-800 bg-gray-100 border-gray-300 focus:ring-orange-500 focus:ring-2">
                        <label for="citizenshipChanged" class="ml-2 text-sm font-medium text-gray-900">Citizenship Address Changed?</label>
                    </div>

                    <!-- Citizenship Address Change Form (Hidden by Default) -->
                    <div id="citizenshipAddressForm" class="hidden mt-6">
                        <h2 class="text-xl font-bold mb-4">New Citizenship Address</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="newTole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                                <input type="text" name="cctole" id="newTole" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                            </div>
                            <div class="mb-6">
                                <label for="newMunicipality" class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                                <input type="text" name="ccmunicipality" id="newMunicipality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                            </div>
                            <div class="mb-6">
                                <label for="newWard" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                                <input type="number" name="ccward" id="newWard" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                            </div>
                            <div class="mb-6">
                                <label for="newDistrict" class="block mb-2 text-sm font-medium text-gray-900">District</label>
                                <input type="text" name="ccdistrict" id="newDistrict" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                            </div>
                            <div class="mb-6">
                                <label for="newProvince" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                                <input type="text" name="ccprovince" id="newProvince" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Current Address/ Temporary Address -->
                <div id="step-2" class="step hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="tole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                            <input type="text" name="ttole" id="tole" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6">
                            <label for="municipality" class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                            <input type="text" name="tmunicipality" id="municipality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6">
                            <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                            <input type="text" name="tward" id="ward" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6">
                            <label for="district" class="block mb-2 text-sm font-medium text-gray-900">District</label>
                            <input type="text" name="tdistrict" id="district" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6">
                            <label for="province" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                            <input type="text" name="tprovince" id="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        </div>
                    </div>
                </div>


                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8">
                    <button type="button" id="prevBtn" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline hidden">Previous</button>
                    <button type="button" id="nextBtn" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
                    <button type="submit" id="submitBtn" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline hidden">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let currentStep = 1;
    const form = document.getElementById('multi-step-form');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    const progressBar = document.getElementById('progress-bar');

    function showStep(step) {
        document.querySelectorAll('.step').forEach(s => s.classList.add('hidden'));
        document.getElementById(`step-${step}`).classList.remove('hidden');
        
        progressBar.style.width = `${(step / 2) * 100}%`;
        for (let i = 1; i <= 2; i++) {
            const stepIndicator = document.getElementById(`step${i}`);
            if (i <= step) {
                stepIndicator.classList.remove('opacity-50');
            } else {
                stepIndicator.classList.add('opacity-50');
            }
        }

        prevBtn.classList.toggle('hidden', step === 1);
        nextBtn.classList.toggle('hidden', step === 2);
        submitBtn.classList.toggle('hidden', step !== 2);
    }

    // Handle the citizenship address change checkbox
    const citizenshipChangedCheckbox = document.getElementById('citizenshipChanged');
    const citizenshipAddressForm = document.getElementById('citizenshipAddressForm');

    citizenshipChangedCheckbox.addEventListener('change', () => {
        if (citizenshipChangedCheckbox.checked) {
            citizenshipAddressForm.classList.remove('hidden');
        } else {
            citizenshipAddressForm.classList.add('hidden');
        }
    });

    function validateStep(step) {
        const currentStepElement = document.getElementById(`step-${step}`);
        const inputs = currentStepElement.querySelectorAll('input[required], select[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value) {
                isValid = false;
                input.classList.add('border-red-500');
            } else {
                input.classList.remove('border-red-500');
            }
        });

        return isValid;
    }

    nextBtn.addEventListener('click', () => {
        if (validateStep(currentStep)) {
            currentStep++;
            showStep(currentStep);
        }
    });

    prevBtn.addEventListener('click', () => {
        currentStep--;
        showStep(currentStep);
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (validateStep(currentStep)) {
            alert('Form submitted successfully!');
            // Here you would typically send the form data to a server
        }
    });

    showStep(currentStep);
</script>

@endsection
