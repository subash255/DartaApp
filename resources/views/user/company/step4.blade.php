@extends('layouts.master')
@section('content')

<div class="bg-white rounded-lg shadow-lg p-6 md:p-10 max-w-3xl mx-auto">
    @include('user.company.contents')
    <div class="container mx-auto p-6">
        <form method="POST" action="{{ route('company.stores') }}">
            @csrf
            <input type="hidden" name="step" value="step4">
            <!-- Step 4: OCR/IRD Login Details -->
            <h3 class="text-lg font-medium text-gray-900 mb-4">OCR Login Details:</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-6">
                    <label for="cid" class="block mb-2 text-sm font-medium text-gray-900">ID</label>
                    <input type="text" name="cid" id="cid" value="{{ old('cid', $company->cid ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="cpassword" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="text" name="cpassword" id="cpassword" value="{{ old('cpassword', $company->cpassword ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                    <select name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                        <option value="">Select a location</option>
                        <option value="kathmandu" {{ old('location', $company->location ?? '') == 'kathmandu' ? 'selected' : '' }}>Kathmandu</option>
                        <option value="butwal" {{ old('location', $company->location ?? '') == 'butwal' ? 'selected' : '' }}>Butwal</option>
                        <option value="itahari" {{ old('location', $company->location ?? '') == 'itahari' ? 'selected' : '' }}>Itahari</option>
                    </select>
                </div>
                
            </div>
            <div class="w-full mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-2">IRD Login Details:</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-6">
                    <label for="rid" class="block mb-2 text-sm font-medium text-gray-900">IRD ID</label>
                    <input type="text" name="rid" id="rid" value="{{ old('rid', $company->rid ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="rpassword" class="block mb-2 text-sm font-medium text-gray-900">IRD Password</label>
                    <input type="text" name="rpassword" id="rpassword" value="{{ old('rpassword', $company->rpassword ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="remail" class="block mb-2 text-sm font-medium text-gray-900">IRD Email</label>
                    <input type="email" name="remail" id="remail" value="{{ old('remail', $company->remail ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="rphone" class="block mb-2 text-sm font-medium text-gray-900">IRD Phone</label>
                    <input type="tel" name="rphone" id="rphone" value="{{ old('rphone', $company->rphone ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="rcontactperson" class="block mb-2 text-sm font-medium text-gray-900">IRD Contact Person</label>
                    <input type="text" name="rcontactperson" id="rcontactperson" value="{{ old('rcontactperson', $company->rcontactperson ?? '')  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" required>
                </div>
            </div>

            <!-- Button Section -->
            <div class="flex justify-between mt-6">
                <a href="{{route('user.company.step3')}}" class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
