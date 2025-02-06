@extends('layouts.master')
@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-10 max-w-3xl mx-auto">
        @include('user.company.contents')
        <div class="container mx-auto p-6">
            <form method="POST" action="{{ route('company.stores') }}">
                @csrf
                <label for="autoFillCheckbox">Auto-fill from Step 1:</label>
                <input type="checkbox" id="autoFillCheckbox" onchange="enableAutoFill()"> 

                <input type="hidden" name="step" value="step3">
                <!-- Step 3: Company Address -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-6">
                        <label for="houseownername" class="block mb-2 text-sm font-medium text-gray-900">House Owner Name</label>
                        <input type="text" name="houseownername" id="houseownername" value="{{ old('houseownername', $company->houseownername ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownertole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                        <input type="text" name="hotole" id="hotole" value="{{ old('hotole', $company->hotole ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownermunicipality" class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                        <input type="text" name="homunicipality" id="homunicipality"
                            value="{{ old('homunicipality', $company->homunicipality ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownerward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                        <input type="text" name="howard" id="howard" value="{{ old('howard', $company->howard ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownerdistrict" class="block mb-2 text-sm font-medium text-gray-900">District</label>
                        <input type="text" name="hodistrict" id="hodistrict"
                            value="{{ old('hodistrict', $company->hodistrict ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownerprovince" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                        <input type="text" name="hoprovince" id="hoprovince"
                            value="{{ old('hoprovince', $company->hoprovince ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownerphone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                        <input type="tel" name="hophone" id="hophone"
                            value="{{ old('hophone', $company->hophone ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="hopan" class="block mb-2 text-sm font-medium text-gray-900">House Owner PAN</label>
                        <input type="text" name="hopan" id="hopan"
                            value="{{ old('hopan', $company->hopan ?? '') }}"
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

    <script>
    // Enable auto-fill if checkbox is checked
    function enableAutoFill() {
        const autoFillChecked = document.getElementById('autoFillCheckbox').checked;
        
        if (autoFillChecked) {
            // Fill fields with data from Step 1 if checkbox is checked
            document.getElementById('hotole').value = localStorage.getItem('tole');
            document.getElementById('hodistrict').value = localStorage.getItem('district');
            document.getElementById('homunicipality').value = localStorage.getItem('municipality');
            document.getElementById('howard').value = localStorage.getItem('ward');
            document.getElementById('hoprovince').value = localStorage.getItem('province');
        } else {
            // Clear the fields if checkbox is unchecked
            document.getElementById('hotole').value = '';
            document.getElementById('hodistrict').value = '';
            document.getElementById('homunicipality').value = '';
            document.getElementById('howard').value = '';
            document.getElementById('hoprovince').value = '';
        }s
    }

    window.onload = function() {
        // Optionally, you can check if the checkbox was already checked in Step 1.
        // This is just to handle if you want to auto-fill on load.
        const autoFillChecked = localStorage.getItem("autoFillChecked") === 'true';
        if (autoFillChecked) {
            document.getElementById('autoFillCheckbox').checked = true;
            enableAutoFill();  // Trigger auto-fill if checkbox was checked
        }
    }
</script>
@endsection
