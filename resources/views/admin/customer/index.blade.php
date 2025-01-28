@extends('layouts.app')
@section('content')
    {{-- Flash Message --}}
    @if (session('success'))
        <div id="flash-message" class="bg-green-500 text-white px-6 py-2 rounded-lg fixed top-4 right-4 shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    <script>
        if (document.getElementById('flash-message')) setTimeout(() => {
            const msg = document.getElementById('flash-message');
            msg.style.opacity = 0;
            msg.style.transition = "opacity 0.5s ease-out";
            setTimeout(() => msg.remove(), 500);
        }, 3000);
    </script>



    <div class="p-4 bg-white shadow-lg -mt-12 mx-4 z-20 rounded-lg">

        <!-- Table Section -->
        <div class="overflow-x-auto">
            <table id="customerTable" class="min-w-full border-separate border-spacing-0 border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">S.N</th>
                        <th class="border border-gray-300 px-4 py-2">Customer Name</th>
                        <th class="border border-gray-300 px-4 py-2">Company Name</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Phone Number</th>
                        <th class="border border-gray-300 px-4 py-2">Company Category </th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="bg-white hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->firstname }}
                                {{ $customer->lastname }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->companyname }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->phone }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->type }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <label for="status{{ $customer->id }}" class="inline-flex items-center cursor-pointer">
                                    <input id="status{{ $customer->id }}" type="checkbox" class="hidden toggle-switch"
                                        data-id="{{ $customer->id }}" {{ $customer->status ? 'checked' : '' }} />
                                    <div class="w-10 h-6 bg-gray-200 rounded-full relative">
                                        <div class="dot absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition">
                                        </div>
                                    </div>
                                </label>
                            </td>
                            <td class="px-2 py-2  justify-center  action-buttons border border-gray-300">

                                <!-- Delete Icon -->
                                <form action="{{ route('admin.customer.delete', ' $customer->id') }}" method="post"
                                    onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="bg-red-500 hover:bg-red-700 p-2 w-10 h-10 rounded-full flex items-center justify-center">
                                        <i class="ri-delete-bin-line text-white"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


    </div>

    <script>
        document.querySelectorAll('.toggle-switch').forEach(toggle => {
            const dot = toggle.parentNode.querySelector('.dot'); // The visual dot for the toggle switch

            // Apply the correct initial state (visual toggle)
            if (toggle.checked) {
                dot.style.transform = 'translateX(100%)';
                dot.style.backgroundColor = 'green';
            } else {
                dot.style.transform = 'translateX(0)';
                dot.style.backgroundColor = 'white';
            }

            // Add event listener to handle checkbox state change
            toggle.addEventListener('change', function() {
                const customerId = this.getAttribute(
                'data-id'); // Get the category ID from the data-id attribute
                const newState = this.checked ? 1 : 0; // 1 for checked, 0 for unchecked

                // Toggle visual effect of the switch
                if (this.checked) {
                    dot.style.transform = 'translateX(100%)';
                    dot.style.backgroundColor = 'green';
                } else {
                    dot.style.transform = 'translateX(0)';
                    dot.style.backgroundColor = 'white';
                }

                // Send AJAX request to update the status
                fetch(`/customer/update-toggle/${customerId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF token for security
                        },
                        body: JSON.stringify({
                            state: newState, // The new state (1 or 0)
                            type: 'status', // Indicate we're updating the status
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.success) {
                            // If update fails, reset the toggle state
                            this.checked = !this.checked;
                            dot.style.transform = this.checked ? 'translateX(100%)' : 'translateX(0)';
                            dot.style.backgroundColor = this.checked ? 'green' : 'white';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Reset the toggle state in case of an error
                        this.checked = !this.checked;
                        dot.style.transform = this.checked ? 'translateX(100%)' : 'translateX(0)';
                        dot.style.backgroundColor = this.checked ? 'green' : 'white';
                    });
            });
        });
    </script>




    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [10, 25, 50, 100],
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: true,
                initComplete: function() {
                    $('.dataTables_length').addClass('flex items-center gap-2 mb-4');
                    $('select').addClass(
                        'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 w-[4rem]'
                    );
                }
            });
        });
    </script>
@endsection
