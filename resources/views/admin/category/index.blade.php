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
    }, 3000);
</script>


<div class="p-4 bg-white shadow-lg -mt-12 mx-4 z-20 rounded-lg">
    <div class="mb-4 flex justify-end">

        <button id="openModalButton" class=" text-orange-500 font-medium bg-white border-2 border-orange-500 rounded-lg py-2 px-4 hover:bg-orange-600 hover:text-white transition duration-300">
            Add Category
        </button>
    </div>

    <!-- Modal Structure for Create Banner -->
    <div id="bannerModal" class="fixed inset-0 bg-black bg-opacity-70 modal-hidden items-center justify-center z-50 backdrop-blur-[1px]">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg relative">
            <h2 class="text-xl font-semibold text-center">Create New Category</h2>
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Banner Image Input -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Category name</label>
                    <input type="text" id="name" name="name" required
                        class="mt-2 px-5 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-300 hover:border-indigo-400 text-lg">
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
    <div class="overflow-x-auto">
        <table id="categoryTable" class="min-w-full border-separate border-spacing-0 border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">S.N</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="bg-white hover:bg-gray-50 ">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $category->name }}
                    <td class="border border-gray-300 px-4 py-2">
                        <div class="flex justify-center gap-2">

                            <button type="button"
                                class="bg-blue-500 hover:bg-blue-700 p-2 w-8 h-8 rounded-full flex items-center justify-center"
                                onclick="openEditModal({{ $category->id }})">
                                <i class="ri-edit-box-line text-white"></i>
                            </button>
                            <!-- Delete Button -->
                            <button type="button"
                                class="bg-red-500 hover:bg-red-700 p-2 w-8 h-8 rounded-full flex items-center justify-center"
                                onclick="openDeleteModal({{ $category->id }})">
                                <i class="ri-delete-bin-line text-white"></i>
                            </button>
                        </div>
                    </td>



                </tr>
                <!--  editModal HTML -->
                <div id="editModal-{{ $category->id }}" class="fixed inset-0 bg-black bg-opacity-70 modal-hidden items-center justify-center z-50 backdrop-blur-[1px]">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg relative">
            <h2 class="text-xl font-semibold text-center">Update Category</h2>
            <form action="{{ route('admin.category.update',$category->id) }}" method="POST" >
                @csrf
                @method('patch')
                
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Category name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $category->name ?? '') }}"required
                        class="mt-2 px-5 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-300 hover:border-indigo-400 text-lg">
                </div>



                <!-- Button Container -->
                <div class="flex justify-between gap-4 mt-8">
                    <!-- Close Button -->
                    <button type="button" id="cancelBtn" onclick="closeEditModal({{ $category->id }})"
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
                <!--  deleteModal HTML -->
                <div id="deleteModal-{{ $category->id }}" class="fixed inset-0 bg-black bg-opacity-70 modal-hidden items-center justify-center z-50 backdrop-blur-[1px] flex">
                    <div class="bg-white p-6 rounded-lg w-96">
                        <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
                        <p>Are you sure you want to delete this category?</p>
                        <div class="mt-4 flex justify-end">
                            <button id="cancelBtn" class="bg-gray-400 hover:bg-gray-600 text-white p-2 rounded-md mr-2" onclick="closeDeleteModal({{ $category->id }})">Cancel</button>
                            <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
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
        $('#categoryTable').DataTable({
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
    // This will open the modal for the specific user
    function openDeleteModal(userId) {
        const deleteModal = document.getElementById(`deleteModal-${userId}`);
        deleteModal.classList.remove('modal-hidden');
        deleteModal.classList.add('modal-visible');
        document.body.classList.add('overflow-hidden'); // Disable scrolling when modal is open
    }

    // Close the modal
    function closeDeleteModal(userId) {
        const deleteModal = document.getElementById(`deleteModal-${userId}`);
        deleteModal.classList.remove('modal-visible');
        deleteModal.classList.add('modal-hidden');
        document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
    }


    // Open the modal
    document.getElementById('openModalButton').addEventListener('click', function() {
        document.getElementById('bannerModal').classList.remove('modal-hidden');
        document.getElementById('bannerModal').classList.add('modal-visible'); // Show modal
        document.body.classList.add('overflow-hidden'); // Disable scrolling when modal is open
    });

    // Close the modal
    document.getElementById('closeModalButton').addEventListener('click', function() {
        document.getElementById('bannerModal').classList.remove('modal-visible');
        document.getElementById('bannerModal').classList.add('modal-hidden'); // Hide modal
        document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
    });

    //edit
    function openEditModal(userId) {
        const editModal = document.getElementById(`editModal-${userId}`);
        editModal.classList.remove('modal-hidden');
        editModal.classList.add('modal-visible');
        document.body.classList.add('overflow-hidden'); // Disable scrolling when modal is open
    }

    // Close the modal
    function closeEditModal(userId) {
        const editModal = document.getElementById(`editModal-${userId}`);
        editModal.classList.remove('modal-visible');
        editModal.classList.add('modal-hidden');
        document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
    }
</script>





@endsection