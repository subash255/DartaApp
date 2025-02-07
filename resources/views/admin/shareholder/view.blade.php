@extends('layouts.app')

@section('content')
<div class="container bg-white mx-auto px-4 py-6">
    <!-- Shareholder Header -->
    <div class="flex items-center justify-between p-4 bg-white shadow-lg -mt-11 z-20 rounded-lg">
        <!-- Back Button on the Left -->
        <a href="{{ route('admin.shareholder.index') }}" class="bg-gray-300 text-gray-800 px-2 py-2 rounded-lg shadow-md hover:bg-gray-200 transition-colors">
            <i class="ri-arrow-left-line"></i>
        </a>

        <!-- Name in the Center -->
        <h2 class="text-4xl font-semibold text-center flex-grow">
            {{ $shareholder->firstname }} {{ $shareholder->lastname }}
        </h2>
    </div>

    <!-- Shareholder Details -->
    <div class="grid grid-cols-1 mt-2 md:grid-cols-2 gap-8">
        <!-- Left Column -->
        <div class="bg-white rounded-lg p-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Personal Details</h3>
            <ul class="space-y-4 text-gray-700">
                <li><strong>Email:</strong> {{ $shareholder->email }}</li>
                <li><strong>Phone:</strong> {{ $shareholder->phone }}</li>
                <li><strong>Citizenship Number:</strong> {{ $shareholder->citizennumber }}</li>
                <li><strong>Father's Name:</strong> {{ $shareholder->fathername }}</li>
                <li><strong>Mother's Name:</strong> {{ $shareholder->mothername }}</li>
                <li><strong>Spouse's Name:</strong> {{ $shareholder->spousename }}</li>
                <li><strong>Grandfather's Name:</strong> {{ $shareholder->grandfathername }}</li>
                <li><strong>Permanent Address:</strong> {{ $shareholder->waddress }}</li>
                <li><strong>Citizenship Issue Date:</strong> {{ $shareholder->issuedate }}</li>
                <li><strong>Citizenship Issue Place:</strong> {{ $shareholder->issuedplace }}</li>
                <li><strong>Notarized:</strong> {{ $shareholder->notarized }}</li>
            </ul>
        </div>

        <!-- Right Column -->
        <div class="bg-white rounded-lg p-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Share Details</h3>
            <ul class="space-y-4 text-gray-700">
                <li><strong>Share Amount:</strong> {{ $shareholder->shareamt }}</li>
                <li><strong>Total Share:</strong> {{ $shareholder->totalshare }}</li>
                <li><strong>Bank Name:</strong> {{ $shareholder->bankname }}</li>
                <li><strong>Bank Branch:</strong> {{ $shareholder->bankbranch }}</li>
                <li><strong>Shareholder ID (NID):</strong> {{ $shareholder->nid }}</li>
                <li><strong>Share From:</strong> {{ $shareholder->sharefrom }}</li>
                <li><strong>Share To:</strong> {{ $shareholder->shareto }}</li>
                <li><strong>Lawyer Name:</strong> {{ $shareholder->lawyername }}</li>
                <li><strong>Lawyer Phone:</strong> {{ $shareholder->lawyerphone }}</li>
                <li><strong>Lawyer ID:</strong> {{ $shareholder->lawyerid }}</li>
                <li><strong>Lawyer ID Validity:</strong> {{ $shareholder->lawyeridvalid }}</li>
            </ul>
        </div>
    </div>

    <!-- Images Section -->
    <div class="bg-white shadow-lg rounded-lg p-6 mt-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Images</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($shareholder->cimage)
            <div class="image-item">
                <h4 class="text-xl font-medium text-gray-700">Citizenship Image</h4>
                <img src="{{ asset('citizenship/'.$shareholder->cimage) }}" alt="Permanent Address Image" class="mt-2 w-full h-auto rounded-lg shadow-md">
            </div>
            @endif
            @if($shareholder->ccimage)
            <div class="image-item">
                <h4 class="text-xl font-medium text-gray-700">Changed Citizenship Image</h4>
                <img src="{{ asset('citizenship/'.$shareholder->ccimage) }}" alt="Temporary Address Image" class="mt-2 w-full h-auto rounded-lg shadow-md">
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
