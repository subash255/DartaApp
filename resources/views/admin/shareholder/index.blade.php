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

        <!-- Table Section -->
        <div class="overflow-x-auto">
            <table id="shareholderTable" class="min-w-full border-separate border-spacing-0 border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">S.N</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Phone No</th>
                        <th class="border border-gray-300 px-4 py-2">Address</th>
                        <th class="border border-gray-300 px-4 py-2">Company</th>
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($shareholders as $shareholder)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $shareholder->firstname }} {{ $shareholder->lastname }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $shareholder->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $shareholder->phone }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $shareholder->tmunicipality }}-{{ $shareholder->tward }},{{ $shareholder->tdistrict }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $shareholder->user->companyname }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                            <div class="flex justify-center gap-2">
                                <!-- View Icon -->
                                <a href="{{route('admin.shareholder.view', $shareholder->id)}}" class="flex items-center">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 p-1 w-8 h-8 rounded-full flex items-center justify-center">
                                        <i class="ri-eye-line text-white"></i>
                                    </button>
                                </a>
                                <!-- Delete Button -->
                                <button type="button" 
                                    class="bg-red-500 hover:bg-red-700 p-2 w-8 h-8 rounded-full flex items-center justify-center"
                                    onclick="openDeleteModal({{ $shareholder->id }})">
                                    <i class="ri-delete-bin-line text-white"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal HTML -->
                    <div id="deleteModal-{{ $shareholder->id }}" class="fixed inset-0 bg-black bg-opacity-70 modal-hidden items-center justify-center z-50 backdrop-blur-[1px] flex">
                        <div class="bg-white p-6 rounded-lg w-96">
                            <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
                            <p>Are you sure you want to delete this shareholder?</p>
                            <div class="mt-4 flex justify-end">
                                <button id="cancelBtn" class="bg-gray-400 hover:bg-gray-600 text-white p-2 rounded-md mr-2" onclick="closeDeleteModal({{ $shareholder->id }})">Cancel</button>
                                <form action="{{ route('user.delete', $shareholder->id) }}" method="post">
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
            $('#shareholderTable').DataTable({
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
</script>
@endsection
