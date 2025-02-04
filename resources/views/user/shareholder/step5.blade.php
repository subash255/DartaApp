@extends('layouts.master')
@section('content')
<div class="container mx-auto p-6">
    <form method="POST" action="{{ route('shareholder.stores') }}">
        @csrf
        <input type="hidden" name="step" value="step5">
        <!-- Step 1: Company Info -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                            <div class="mb-6">
                                <label for="shareamount" class="block mb-2 text-sm font-medium text-gray-900">Share
                                    Amount</label>
                                <input type="text" name="shareamt" id="shareamt"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('shareamt', $userdetail->shareamt ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="shareno" class="block mb-2 text-sm font-medium text-gray-900">Share
                                    No:</label>
                                <input type="text" name="shareno" id="shareno"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('shareno', $userdetail->shareno ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="sharefrom" class="block mb-2 text-sm font-medium text-gray-900">From:</label>
                                <input type="text" name="sharefrom" id="sharefrom"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('sharefrom', $userdetail->sharefrom ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="shareto" class="block mb-2 text-sm font-medium text-gray-900">To:</label>
                                <input type="text" name="shareto" id="shareto"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('shareto', $userdetail->shareto ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="totalshare"
                                    class="block mb-2 text-sm font-medium text-gray-900">Total:</label>
                                <input type="number" name="totalshare" id="totalshare"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('totalshare', $userdetail->totalshare ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="addshare" class="block mb-2 text-sm font-medium text-gray-900">Additional
                                    Share</label>
                                <input type="text" name="addshare" id="addshare"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('addshare', $userdetail->addshare ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="salesofshare" class="block mb-2 text-sm font-medium text-gray-900">Sales of
                                    Share</label>
                                <input type="text" name="salesofshare" id="salesofshare"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('salesofshare', $userdetail->salesofshare ?? '') }}" required>
                            </div>

                        </div>
                        <!-- Lawyer Details Section (on new line) -->
                        <div class="w-full mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Lawyer Details</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="w-full mb-6">
                                <label for="lawyerid" class="block mb-2 text-sm font-medium text-gray-900">Lawyer
                                    Id:</label>
                                <input type="number" name="lawyerid" id="lawyerid"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('lawyerid', $userdetail->lawyerid ?? '') }}" required>
                            </div>
                            <div class="w-full mb-6">
                                <label for="lawyername" class="block mb-2 text-sm font-medium text-gray-900">Lawyer
                                    Name</label>
                                <input type="text" name="lawyername" id="lawyername"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('lawyername', $userdetail->lawyername ?? '') }}" required>
                            </div>
                            <div class="w-full mb-6">
                                <label for="lawyerphone" class="block mb-2 text-sm font-medium text-gray-900">Lawyer
                                    Phone</label>
                                <input type="tel" name="lawyerphone" id="lawyerphone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('lawyerphone', $userdetail->lawyerphone ?? '') }}" required>
                            </div>
                            <div class="w-full mb-6">
                                <label for="lawyeridvalid" class="block mb-2 text-sm font-medium text-gray-900">Id
                                    Valid:</label>
                                <input type="text" name="lawyeridvalid" id="lawyeridvalid"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('lawyeridvalid', $userdetail->lawyeridvalid ?? '') }}" required>
                            </div>

                        </div>
        <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
    </form>
</div>
@endsection
