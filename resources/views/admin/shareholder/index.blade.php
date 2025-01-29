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
                            <td class="px-2 py-2 flex justify-center space-x-4 border border-gray-300">
                                <!-- View Icon -->
                                <a href="{{route('admin.shareholder.view', $shareholder->id)}}" class="flex items-center">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 p-1 w-8 h-8 rounded-full flex items-center justify-center">
                                        <i class="ri-eye-line text-white"></i>
                                    </button>
                                </a>
                                <!-- Delete Icon -->
                                <form action="{{ route('admin.shareholder.delete', $shareholder->id) }}"
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
@endsection
