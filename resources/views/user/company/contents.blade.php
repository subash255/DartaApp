<div class="mb-8">
    <div class="flex justify-between mb-2">
        <a href="{{route('user.company.step1')}}" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200" id="step1">
            Company Details
        </a>
        <a href="{{route('user.company.step2')}}" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step2">
            Office Address
        </a>
        <a href="{{route('user.company.step3')}}" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step3">
           House Owner Details
        </a>
        <a href="{{route('user.company.step4')}}" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step4">
            Company Bank Details
        </a>
        <a href="{{route('user.company.step5')}}" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step5">
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
