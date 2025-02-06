<div class="mb-8">
    <div class="flex justify-between mb-2">
        <a href="{{route('user.shareholder.step1', $userdetail->id)}}"class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step1">Shareholder's Details</a>
        <a href="{{route('user.shareholder.step2')}}"class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step2">Address per Citizenship</a>
        <a href="{{route('user.shareholder.step3')}}"class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step3">Current Address</a>
        <a href="{{route('user.shareholder.step4')}}"class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step4">Add. Info</a>
        <a href="{{route('user.shareholder.step5')}}"class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step5">Share Details</a>
        <a href="{{route('user.shareholder.step6')}}"class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50" id="step6">Acc. Details</a>
    </div>
    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-orange-200">
        <div id="progress-bar" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500 w-0 transition-all duration-500 ease-in-out">
        </div>
    </div>
</div>

<script>
    // Get the current active step dynamically (this should be passed from your server-side template)
    const currentStep = "{{ $currentStep ?? 'step1' }}";  
    const steps = ['step1', 'step2', 'step3', 'step4', 'step5', 'step6'];
    const progressBar = document.getElementById('progress-bar');
    const stepElements = steps.map(step => document.getElementById(step));

    // Calculate the index of the current step
    let stepIndex = steps.indexOf(currentStep);
    
    // Check if the stepIndex is valid, otherwise default to the first step
    if (stepIndex === -1) stepIndex = 0;
    
    // Update progress bar width (each step represents 16.66%)
    progressBar.style.width = `${(stepIndex + 1) * 16.66}%`; 

    // Update opacity for steps based on the current step
    for (let i = 0; i <= stepIndex; i++) {
        stepElements[i].classList.remove('opacity-50');  
        stepElements[i].classList.add('opacity-100');
    }

    // Apply opacity-50 for steps that haven't been reached yet
    for (let i = stepIndex + 1; i < steps.length; i++) {
        stepElements[i].classList.remove('opacity-100');  // Remove full opacity for unfinished steps
        stepElements[i].classList.add('opacity-50');      // Apply reduced opacity for unfinished steps
    }
</script>
