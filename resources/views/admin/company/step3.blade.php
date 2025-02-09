@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


<div class="p-4 bg-white shadow-lg -mt-12 mx-4 z-20 rounded-lg">
    @include('admin.company.contents')
    <div class="container mx-auto p-6">
        <form method="POST" action="{{ route('admin.company.step3.update',$company->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="step" value="step3">
            <!-- Step 3: Company Address -->
            <!-- Checkbox to auto-fill Step 2 details -->
            <div class="mb-6 flex items-center justify-start">
                <input type="hidden" id="copystep2data_hidden" name="copystep2data" value="{{ old('copystep2data', $company->copystep2data ?? 0) }}">

                <input type="checkbox" id="copyStep2Data"
                    {{ old('copystep2data', $company->copystep2data ?? 0) == 1 ? 'checked' : '' }}
                    class="w-4 h-4 text-gray-800 bg-gray-100 border-gray-300 focus:ring-orange-500 focus:ring-2">
                <label for="copyStep2Data" class="ml-2 text-sm font-medium text-gray-900">Same address as citizenship?</label>
            </div>
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
                <!-- Lalpurja Image -->
<div class="mb-6">
    <label for="lalpurja" class="block mb-2 text-sm font-medium text-gray-900">Lalpurja</label>
    <input type="file" name="holalpurja" id="lalpurja"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">

    <!-- Show old image if available -->
    @if (!empty($company->holalpurja))
    <img src="{{ asset('document/' . $company->holalpurja) }}" alt="Lalpurja Image" class="mt-2 max-w-xs h-auto rounded-lg">
    @endif
</div>

<!-- Tiro Image -->
<div class="mb-6">
    <label for="tiro" class="block mb-2 text-sm font-medium text-gray-900">Tiro</label>
    <input type="file" name="hotiro" id="tiro"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">

    <!-- Show old image if available -->
    @if (!empty($company->hotiro))
    <img src="{{ asset('document/' . $company->hotiro) }}" alt="Tiro Image" class="mt-2 max-w-xs h-auto rounded-lg">
    @endif
</div>

                <div id="map" style="width:650px;height:250px;"></div>

                <input type="hidden" id="latitude" name="lat" value="{{ old('lat', $company->lat ?? 27) }}">
                <input type="hidden" id="longitude" name="lng" value="{{ old('lng', $company->lng ?? 84) }}">

            </div>

            <!-- Button Section -->
            <div class="flex justify-between mt-6">
                <a href="{{ route('admin.company.step2',$company->id) }}"
                    class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
                <button type="submit"
                    class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
            </div>
        </form>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const copyStep2Checkbox = document.getElementById('copyStep2Data');
        const hiddenField = document.getElementById('copystep2data_hidden');

        const toleField = document.getElementById('hotole');
        const municipalityField = document.getElementById('homunicipality');
        const wardField = document.getElementById('howard');
        const provinceField = document.getElementById('hoprovince');
        const districtField = document.getElementById('hodistrict');

        function updateFields() {
            if (copyStep2Checkbox.checked) {
                // Set hidden input to 1
                hiddenField.value = "1";

                // Copy data from citizenship address fields
                toleField.value = "{{ old('tole', $company->tole ?? '') }}";
                municipalityField.value = "{{ old('municipality', $company->municipality ?? '') }}";
                wardField.value = "{{ old('ward', $company->ward ?? '') }}";
                provinceField.value = "{{ old('province', $company->province ?? '') }}";
                districtField.value = "{{ old('district', $company->district ?? '') }}";
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get saved coordinates or use defaults
        var savedLat = parseFloat(document.getElementById("latitude").value) || 27.692;
        var savedLng = parseFloat(document.getElementById("longitude").value) || 84.428;

        var map = L.map('map').setView([savedLat, savedLng], 15);

        // Set OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a draggable marker at the saved/default location
        var marker = L.marker([savedLat, savedLng], { draggable: true }).addTo(map);

        // Update input fields when marker is dragged
        marker.on('dragend', function() {
            var lat = marker.getLatLng().lat;
            var lng = marker.getLatLng().lng;

            document.getElementById("latitude").value = lat;
            document.getElementById("longitude").value = lng;
        });
    });
</script>


@endsection