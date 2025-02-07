@extends('layouts.master')
@section('content')

<div class="bg-white rounded-lg shadow-lg p-6 md:p-10 max-w-3xl mx-auto">
    @include('user.company.contents')
<div class="container mx-auto p-6">
    <form method="POST" action="{{ route('user.company.step4.update',$company->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="step" value="step4">
        <!-- Step 4: Company Bank Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="mb-6">
            <label for="accno" class="block mb-2 text-sm font-medium text-gray-900">Account Number</label>
            <input type="text" name="accno" id="accno" value="{{ old('accno', $company->accno ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="bankname" class="block mb-2 text-sm font-medium text-gray-900">Bank Name</label>
            <input type="text" name="bankname" id="bankname" value="{{ old('bankname', $company->bankname ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="bankbranch" class="block mb-2 text-sm font-medium text-gray-900">Bank Branch</label>
            <input type="text" name="bankbranch" id="bankbranch" value="{{ old('bankbranch', $company->bankbranch ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="signature" class="block mb-2 text-sm font-medium text-gray-900">Signature</label>
            <input type="text" name="signature" id="signature" value="{{ old('signature', $company->signature ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        <div class="mb-6">
            <label for="created" class="block mb-2 text-sm font-medium text-gray-900">Account Opened On</label>
            <input type="date" name="created" id="created" value="{{ old('created', $company->created ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
        </div>
        </div>
                    <!-- Button Section -->
                    <div class="flex justify-between mt-6">
                        <a href="{{route('user.company.step3',$company->id)}}" class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
                        <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
                    </div>
    </form>
</div>
</div>
@endsection
