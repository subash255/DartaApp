@extends('layouts.master')
@section('content')
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="container mx-auto p-4">
            <div class="bg-white rounded-lg shadow-lg p-6 md:p-10 max-w-3xl mx-auto">
                <h1 class="text-3xl font-bold text-center mb-8">Your Details</h1>

                <!-- Progress Bar -->
                <div class="mb-8">
                    <div class="flex justify-between mb-2">
                        <span
                            class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50"
                            id="step1">
                            Shareholder's Details
                        </span>
                        <span class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200"
                            id="step2">
                            Address per Citizenship
                        </span>
                        <span
                            class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50"
                            id="step3">
                            Current Address
                        </span>
                        <span
                            class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50"
                            id="step4">
                            Add. Info
                        </span>
                        <span
                            class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50"
                            id="step5">
                            Share Details
                        </span>
                        <span
                            class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50"
                            id="step6">
                            Acc. Details
                        </span>
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-orange-200">
                        <div id="progress-bar"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500 w-1/3 transition-all duration-500 ease-in-out">
                        </div>
                    </div>
                </div>

                <!-- Form Steps -->
                <form action="{{ $userdetail->id ? route('userdetail.store', $userdetail->id) : route('userdetail.store') }}" id="userForm" method="POST">
                    @csrf
                    <!-- If editing, send PUT request for updating -->
                    @if($userdetail->id)
                        @method('patch')  <!-- Use PUT for updating an existing record -->
                    @endif
                    <!-- Step 1: Shareholder's Details -->
                    <div id="step-1" class="step">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div class="mb-6">
                                <label for="firstname"
                                    class="block mb-2 text-sm font-medium text-gray-900">Firstname</label>
                                <input type="text" name="firstname" id="firstname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('firstname', $userdetail->firstname ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900">Lastname</label>
                                <input type="text" name="lastname" id="lastname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('lastname', $userdetail->lastname ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Witness
                                    Name</label>
                                <input type="text" name="wname" id="wname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('wname', $userdetail->wname ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Witness
                                    Address</label>
                                <input type="text" name="waddress" id="waddress"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('waddress', $userdetail->waddress ?? '') }}" required>
                            </div>

                        </div>
                    </div>

                    <!-- Step 2: Address as per Citizenship -->
                    <div id="step-2" class="step hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="tole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                                <input type="text" name="ctole" id="tole"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('ctole', $userdetail->ctole ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="municipality"
                                    class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                                <input type="text" name="cmunicipality" id="municipality"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('cmunicipality', $userdetail->cmunicipality ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                                <input type="number" name="cward" id="ward"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('cward', $userdetail->cward ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="district" class="block mb-2 text-sm font-medium text-gray-900">District</label>
                                <input type="text" name="cdistrict" id="district"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('cdistrict', $userdetail->cdistrict ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="province" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                                <input type="text" name="cprovince" id="province"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('cprovince', $userdetail->cprovince ?? '') }}" required>
                            </div>
                        </div>

                        <!-- Citizenship Address Changed Checkbox -->
                        <div class="mb-6 flex items-center justify-start">
                            <input type="checkbox" id="citizenshipChanged"
                                class="w-4 h-4 text-gray-800 bg-gray-100 border-gray-300 focus:ring-orange-500 focus:ring-2">
                            <label for="citizenshipChanged" class="ml-2 text-sm font-medium text-gray-900">Citizenship
                                Address Changed?</label>
                        </div>

                        <!-- Citizenship Address Change Form (Hidden by Default) -->
                        <div id="citizenshipAddressForm" class="hidden mt-6">
                            <h2 class="text-xl font-bold mb-4">New Citizenship Address</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="mb-6">
                                    <label for="newTole"
                                        class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                                    <input type="text" name="cctole" id="newTole"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                        value="{{ old('cctole', $userdetail->cctole ?? '') }}">
                                </div>
                                <div class="mb-6">
                                    <label for="newMunicipality"
                                        class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                                    <input type="text" name="ccmunicipality" id="newMunicipality"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                        value="{{ old('ccmunicipality', $userdetail->ccmunicipality ?? '') }}">
                                </div>
                                <div class="mb-6">
                                    <label for="newWard"
                                        class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                                    <input type="number" name="ccward" id="newWard"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                        value="{{ old('ccward', $userdetail->ccward ?? '') }}">
                                </div>
                                <div class="mb-6">
                                    <label for="newDistrict"
                                        class="block mb-2 text-sm font-medium text-gray-900">District</label>
                                    <input type="text" name="ccdistrict" id="newDistrict"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                        value="{{ old('ccdistrict', $userdetail->ccdistrict ?? '') }}">
                                </div>
                                <div class="mb-6">
                                    <label for="newProvince"
                                        class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                                    <input type="text" name="ccprovince" id="newProvince"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                        value="{{ old('ccprovince', $userdetail->ccprovince ?? '') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Current Address/ Temporary Address -->
                    <div id="step-3" class="step hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="tole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                                <input type="text" name="ttole" id="tole"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('ttole', $userdetail->ttole ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="municipality"
                                    class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                                <input type="text" name="tmunicipality" id="municipality"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('tmunicipality', $userdetail->tmunicipality ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                                <input type="number" name="tward" id="ward"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('tward', $userdetail->tward ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="district"
                                    class="block mb-2 text-sm font-medium text-gray-900">District</label>
                                <input type="text" name="tdistrict" id="district"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('tdistrict', $userdetail->tdistrict ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="province"
                                    class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                                <input type="text" name="tprovince" id="province"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('tprovince', $userdetail->tprovince ?? '') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Additional Info -->
                    <div id="step-4" class="step hidden">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="mb-6">
                                <label for="citizennumber"
                                    class="block mb-2 text-sm font-medium text-gray-900">Citizenship No:</label>
                                <input type="number" name="citizennumber" id="citizennumber"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('citizennumber', $userdetail->citizennumber ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="issuedate" class="block mb-2 text-sm font-medium text-gray-900">Issued
                                    Date</label>
                                <input type="date" name="issuedate" id="issuedate"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('issuedate', $userdetail->issuedate ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="issuedplace" class="block mb-2 text-sm font-medium text-gray-900">Issued
                                    Place</label>
                                <input type="text" name="issuedplace" id="issuedplace"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('issuedplace', $userdetail->issuedplace ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="notarized"
                                    class="block mb-2 text-sm font-medium text-gray-900">Notarized</label>
                                <input type="text" name="notarized" id="notarized"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('notarized', $userdetail->notarized ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="fathername" class="block mb-2 text-sm font-medium text-gray-900">Father
                                    Name</label>
                                <input type="text" name="fathername" id="fathername"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('fathername', $userdetail->fathername ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="mothername" class="block mb-2 text-sm font-medium text-gray-900">Mother
                                    Name</label>
                                <input type="text" name="mothername" id="mothername"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('mothername', $userdetail->mothername ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="spousename" class="block mb-2 text-sm font-medium text-gray-900">Spouse
                                    Name</label>
                                <input type="text" name="spousename" id="spousename"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('spousename', $userdetail->spousename ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="grandfathername" class="block mb-2 text-sm font-medium text-gray-900">Grand
                                    Father Name</label>
                                <input type="text" name="grandfathername" id="grandfathername"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('grandfathername', $userdetail->grandfathername ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="contact" class="block mb-2 text-sm font-medium text-gray-900">Contact
                                    No:</label>
                                <input type="tel" name="phone" id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('phone', $userdetail->phone ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="contact" class="block mb-2 text-sm font-medium text-gray-900">Optional
                                    No:</label>
                                <input type="tel" name="optphone" id="optphone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('optphone', $userdetail->optphone ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('email', $userdetail->email ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="optemail" class="block mb-2 text-sm font-medium text-gray-900">Optional
                                    Email</label>
                                <input type="email" name="optemail" id="optemail"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('optemail', $userdetail->optemail ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="pan" class="block mb-2 text-sm font-medium text-gray-900">Personal
                                    PAN</label>
                                <input type="number" name="pan" id="pan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('pan', $userdetail->pan ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="nid" class="block mb-2 text-sm font-medium text-gray-900">National
                                    ID</label>
                                <input type="number" name="nid" id="nid"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('nid', $userdetail->nid ?? '') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5: Share Details -->
                    <div id="step-5" class="step hidden">
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
                    </div>

                     <!-- Step 6: Acc Details -->
                <div id="step-6" class="step hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="accno" class="block mb-2 text-sm font-medium text-gray-900">Account
                                No:</label>
                            <input type="text" name="accno" id="accno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" value="{{ old('accno', $userdetail->accno ?? '') }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="bankname" class="block mb-2 text-sm font-medium text-gray-900">Bank
                                Name</label>
                            <input type="text" name="bankname" id="bankname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" value="{{ old('bankname', $userdetail->bankname ?? '') }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="bankbranch" class="block mb-2 text-sm font-medium text-gray-900">Branch</label>
                            <input type="text" name="bankbranch" id="bankbranch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" value="{{ old('bankbranch', $userdetail->bankbranch ?? '') }}" required>
                        </div>
                    </div>
                </div>


                    <!-- Navigation Buttons -->
                    <div class="flex justify-between mt-8">
                        <button type="button" id="prevBtn"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline hidden">Previous</button>
                        <button type="button" id="nextBtn"
                            class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
                        <button type="submit" id="submitBtn"
                            class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline hidden">Submit</button>
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
        const progressBar = document.getElementById('progress-bar');

        function showStep(step) {
            document.querySelectorAll('.step').forEach(s => s.classList.add('hidden'));
            document.getElementById(`step-${step}`).classList.remove('hidden');

            progressBar.style.width = `${(step / 6) * 100}%`;
            for (let i = 1; i <= 6; i++) {
                const stepIndicator = document.getElementById(`step${i}`);
                if (i <= step) {
                    stepIndicator.classList.remove('opacity-50');
                } else {
                    stepIndicator.classList.add('opacity-50');
                }
            }

            prevBtn.classList.toggle('hidden', step === 1);
            nextBtn.classList.toggle('hidden', step === 6);
            submitBtn.classList.toggle('hidden', step !== 6);
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

        showStep(currentStep);
    </script>
    <script>
 $(document).ready(function() {
    // Handle "Next" button click
    $('#nextBtn').on('click', function(event) {
        event.preventDefault();  // Prevent default form submission

        // Send AJAX request to save data
        saveFormData();
    });

    // Function to send AJAX request to store data
    function saveFormData() {
        var formData = $('#userForm').serialize();  // Serialize form data

        // Send AJAX request to store data
        $.ajax({
            url: $('#userForm').attr('action'),  // Form's action URL (POST to store)
            type: 'POST',  // Ensure POST for creating or updating data
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // CSRF token for security
            },
            success: function(response) {
                if (response.success) {
                    console.log('Data saved successfully!');
                    // Optionally, move to next section or show a success message
                } else {
                    console.log('Error saving data:', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('An error occurred while saving data.');
            }
        });
    }
});


        </script>
 
@endsection
