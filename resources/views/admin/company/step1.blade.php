@extends('layouts.app')
@section('content')
<div class="p-4 bg-white shadow-lg -mt-12 mx-4 z-20 rounded-lg">

    @include('admin.company.contents')
    <div class="container mx-auto p-6">
        <form method="POST" action="{{$company ? route('admin.company.step1.update', $company->id) : route('admin.company.step1.store')}}">
            @csrf
            @if($company)
            @method('PUT')
            @endif
            <input type="hidden" name="step" value="step1">
            <!-- Step 1: Company Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-6">
                    <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900">Company
                        Name</label>
                    <input id="company_name" value="{{ $user->companyname }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" readonly>
                </div>
                <div class="mb-6">
                    <label for="regno" class="block mb-2 text-sm font-medium text-gray-900">Registration
                        Number</label>
                    <input type="text" name="regno" id="regno" value="{{ old('regno', $company->regno ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                </div>
                <div class="mb-6">
                    <label for="regdate" class="block mb-2 text-sm font-medium text-gray-900">Registration Date</label>
                    <input type="date" name="regdate" id="regdate" value="{{ old('regdate', $company->regdate ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                </div>
                <div class="mb-6">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                    <input id="category" value="{{ $user->type }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" readonly>
                </div>

                <div class="mb-6">
                    <label for="vat_pan" class="block mb-2 text-sm font-medium text-gray-900">VAT/PAN</label>
                    <select name="vat_pan" id="vat_pan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                        <option value="">Select VAT or PAN</option>
                        <option value="vat" {{ old('vat_pan', $company->vat_pan ?? '') == 'vat' ? 'selected' : '' }}>VAT</option>
                        <option value="pan" {{ old('vat_pan', $company->vat_pan ?? '') == 'pan' ? 'selected' : '' }}>PAN</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="pan_no" class="block mb-2 text-sm font-medium text-gray-900">PAN/VAT No:</label>
                    <input type="text" name="pan" id="pan" value="{{ old('pan', $company->pan ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                </div>
                <div class="mb-6">
                    <label for="panregdate" class="block mb-2 text-sm font-medium text-gray-900">PAN/VAT Registration
                        Date</label>
                    <input type="date" name="panregdate" id="panregdate" value="{{ old('panregdate', $company->panregdate ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                </div>
            </div>
            <button type="submit"
                class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
        </form>
    </div>

</div>
@endsection