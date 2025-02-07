<div class="mb-4">
    @if(isset($company) && $company->status == 'pending')
    <div class="flex items-start p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 rounded-lg shadow-md" role="alert">
        <svg class="w-6 h-6 mr-3 mt-1 text-yellow-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div>
            <p class="font-semibold text-lg">Under Registeration</p>
            <p class="text-sm">Your company registration is pending. Please complete all steps to submit for approval.</p>
        </div>
    </div>
    @elseif(isset($company) && $company->status == 'approved')
    <div class="flex items-start p-4 bg-green-100 border-l-4 border-green-500 text-green-800 rounded-lg shadow-md" role="alert">
        <svg class="w-6 h-6 mr-3 mt-1 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
        </svg>
        <div>
            <p class="font-semibold text-lg">Registered</p>
            <p class="text-sm">Your company registration has been approved successfully.</p>
        </div>
    </div>
    @elseif(isset($company) && $company->status == 'rejected')
    <div class="flex items-start p-4 bg-red-100 border-l-4 border-red-500 text-red-800 rounded-lg shadow-md" role="alert">
        <svg class="w-6 h-6 mr-3 mt-1 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <div>
            <p class="font-semibold text-lg">Rejected</p>
            <p class="text-sm">Your company registration was rejected. Please contact the admin for more details.</p>
        </div>
    </div>
    @endif
</div>


<div class="mb-8">
    <div class="flex justify-between mb-2">
        <a href="{{route('user.company.step1')}}" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200" id="step1">
            Company Details
        </a>
        <a href="{{route('user.company.step2', $company->id  ?? '')}}" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step2">
            Office Address
        </a>
        <a href="{{route('user.company.step3', $company->id  ?? '')}}" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step3">
           House Owner Details
        </a>
        <a href="{{route('user.company.step4', $company->id  ?? '')}}" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step4">
            Company Bank Details
        </a>
        <a href="{{route('user.company.step5', $company->id  ?? '')}}" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step5">
            OCR/IRD Details
        </a>

    </div>
    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-orange-200">
        <div id="progress-bar"
            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500 transition-all duration-500 ease-in-out">
        </div>
    </div>
</div>

<script>
    // Dynamic step logic based on passed active step
    const currentStep = "{{ $currentStep ?? 'step1' }}";  // Get the current step from the controller
    const steps = ['step1', 'step2', 'step3', 'step4','step5'];
    const progressBar = document.getElementById('progress-bar');
    const stepElements = steps.map(step => document.getElementById(step));

    // Update progress bar width
    let stepIndex = steps.indexOf(currentStep);
    progressBar.style.width = `${(stepIndex + 1) * 20}%`;  // Each step is 25% of the total width

    // Update opacity for steps
    for (let i = 0; i <= stepIndex; i++) {
        stepElements[i].classList.remove('opacity-50');
    }
</script>
