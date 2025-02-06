@extends('layouts.app')
@section('content')

<style>
    /* Hide the modal */
    .modal-hidden {
    display: none !important;
}

/* Show the modal with flex */
.modal-visible {
    display: flex !important;
}
</style>

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
        }, 2000);
    </script>



    <div class="p-4 bg-white shadow-lg -mt-12 mx-4 z-20 rounded-lg">
        <div class="mb-4 flex justify-end">

            <button id="openModalButton" class=" text-orange-500 font-medium bg-white border-2 border-orange-500 rounded-lg py-2 px-4 hover:bg-orange-600 hover:text-white transition duration-300">
                Add Todolist
            </button>
        </div>
    
        <!-- Modal Structure for Create todo -->
        <div id="todoModal" class="fixed inset-0 bg-black bg-opacity-70 modal-hidden items-center justify-center z-50 backdrop-blur-[1px]">
            <div class="bg-white rounded-lg p-6 w-full max-w-lg relative">
                <h2 class="text-xl font-semibold text-center">Create New Todolist</h2>
                <form action="{{ route('admin.todo.store',$company->id) }}" method="POST">
                    @csrf
                    <!-- todo title -->
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" name="title" required
                            class="mt-2 px-5 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-300 hover:border-indigo-400 text-lg">
                    </div>
                    
                    <!-- todo description -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" required
                            class="mt-2 px-5 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-300 hover:border-indigo-400 text-lg"></textarea>
                    </div>
    
    
                    <!-- Button Container -->
                    <div class="flex justify-between gap-4 mt-8">
                        <!-- Close Button -->
                        <button type="button" id="closeModalButton"
                            class="w-full md:w-auto bg-red-500 text-white py-2 px-4 font-semibold rounded-lg hover:bg-red-600 transition duration-300 focus:outline-none">
                            Cancel
                        </button>
    
                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full md:w-auto bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 transform hover:scale-105">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Table Section -->
        <div class="overflow-x-auto w-full">
            <table id="todoTable" class="min-w-full border-separate border-spacing-0 border border-gray-300">        
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">S.N</th>
                        <th class="border border-gray-300 px-4 py-2">Title</th>
                        <th class="border border-gray-300 px-4 py-2">Description</th>
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todolist as $todo)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $todo->title }}</td>
                            <td class="border border-gray-300 px-4 py-2"> {{ $todo->description }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex justify-center gap-2">
                                    <!-- View Icon -->
                                    <a href="#" class="flex items-center">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 p-1 w-8 h-8 rounded-full flex items-center justify-center">
                                            <i class="ri-eye-line text-white"></i>
                                        </button>
                                    </a>
                                  
                                   
                                    <!-- Delete Button -->
                                    <button type="button" 
                                        class="bg-red-500 hover:bg-red-700 p-2 w-8 h-8 rounded-full flex items-center justify-center"
                                        onclick="openDeleteModal({{ $todo->id }})">
                                        <i class="ri-delete-bin-line text-white"></i>
                                    </button>
                                </div>
                            </td>
                                            </tr>
                        
                                            <!-- Modal HTML -->
                                            <div id="deleteModal-{{ $todo->id }}" class="fixed inset-0 bg-black bg-opacity-70 modal-hidden items-center justify-center z-50 backdrop-blur-[1px] flex">
                                                <div class="bg-white p-6 rounded-lg w-96">
                                                    <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
                                                    <p>Are you sure you want to delete this todolist?</p>
                                                    <div class="mt-4 flex justify-end">
                                                        <button id="cancelBtn" class="bg-gray-400 hover:bg-gray-600 text-white p-2 rounded-md mr-2" onclick="closeDeleteModal({{ $todo->id }})">Cancel</button>
                                                        <form action="{{route('admin.todo.delete',$todo->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white p-2 rounded-md">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                    @endforeach
                </tbody>
            </table>

        </div>


    </div>

    
   



    <script>
        $(document).ready(function() {
            $('#todoTable').DataTable({
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


<script>
        function filterByStatus(status) {
        // Update the URL with the selected status
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('status', status);
        window.location.href = currentUrl.toString(); 
    }

    // This will open the modal for the specific user
    function openDeleteModal(userId) {
        const deleteModal = document.getElementById(`deleteModal-${userId}`);
        deleteModal.classList.remove('modal-hidden');
        deleteModal.classList.add('modal-visible');
        document.body.classList.add('overflow-hidden');
    }

    // Close the modal
    function closeDeleteModal(userId) {
        const deleteModal = document.getElementById(`deleteModal-${userId}`);
        deleteModal.classList.remove('modal-visible');
        deleteModal.classList.add('modal-hidden');
        document.body.classList.remove('overflow-hidden'); 
    }

     // Open the modal
     document.getElementById('openModalButton').addEventListener('click', function() {
        document.getElementById('todoModal').classList.remove('modal-hidden');
        document.getElementById('todoModal').classList.add('modal-visible'); // Show modal
        document.body.classList.add('overflow-hidden'); // Disable scrolling when modal is open
    });

    // Close the modal
    document.getElementById('closeModalButton').addEventListener('click', function() {
        document.getElementById('todoModal').classList.remove('modal-visible');
        document.getElementById('todoModal').classList.add('modal-hidden'); // Hide modal
        document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
    });
</script>
@endsection
