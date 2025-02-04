@extends('layouts.master')
@section('content')

 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- DataTables CSS -->
 <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />

 <!-- DataTables JS -->
 <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>

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

<div class="p-4 shadow-lg mt-12 rounded-lg">
    <div class="mb-4 flex justify-end">
        <a href="{{ route('user.shareholder.step1') }}"
            class="text-orange-500 font-medium bg-white border-2 border-orange-500 rounded-lg py-2 px-4 hover:bg-orange-600 hover:text-white transition duration-300">
            Add Details
        </a>
    </div>

    <div class="overflow-x-auto">
        <!-- Table Section -->
        <table id="userTable" class="min-w-full border-separate border-spacing-0 border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">S.N</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Address</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userdetail as $detail)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $detail->firstname }} {{ $detail->lastname }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $detail->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $detail->tmunicipality }}-{{ $detail->tward }},{{ $detail->tdistrict }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex justify-center gap-2">
                            <!-- View Icon -->
                            <a href="{{route('user.userdetail', $detail->id)}}" class="flex items-center">
                                <button
                                    class="bg-orange-500 hover:bg-orange-700 p-1 w-8 h-8 rounded-full flex items-center justify-center">
                                    <i class="ri-eye-line text-white"></i>
                                </button>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#"
                                class="bg-blue-500 hover:bg-blue-700 p-2 w-8 h-8 rounded-full flex items-center justify-center">
                                <i class="ri-edit-box-line text-white"></i>
                            </a>
                            <!-- Delete Icon -->
                            <form action="#"
                                method="post" onsubmit="return confirm('Are you sure you want to delete this food item?');">
                                @csrf
                                @method('delete')
                                <button class="bg-red-500 hover:bg-red-700 p-2 w-8 h-8 rounded-full flex items-center justify-center">
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
    $(document).ready(function () {
        $('#userTable').DataTable({
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 100], 
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            lengthChange: true,
            initComplete: function () {
                $('.dataTables_length').addClass('flex items-center gap-2 mb-4'); 
                $('select').addClass('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 w-[4rem]'); 
            }
        });
    });
</script>

@endsection
