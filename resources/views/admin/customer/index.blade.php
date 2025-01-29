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
                        <tr class="bg-white hover:bg-gray-50 ">
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->firstname }}
                                {{ $customer->lastname }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->companyname }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->phone }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->type }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $customer->status }}</td>
                            @if($customer->status == 'new')
                            <td class="px-2 py-2 flex justify-center space-x-4 action-buttons border border-gray-300">
                                <!-- confirm Icon -->
                                
                                <a href="{{route('customer.accepted',$customer->id)}}"
                                    class="bg-green-500 hover:bg-green-700 p-2 w-8 h-8 rounded-full flex items-center">
                                    <i class="ri-check-line"></i>
                                </a>
                                <a href="{{route('customer.rejected',$customer->id)}}"
                                    class="bg-red-500 hover:bg-red-700 p-2 w-8 h-8 rounded-full flex items-center">
                                    <i class="ri-close-fill text-white"></i>
                                </a>
                               
                                <!-- Delete Icon -->
                                <form action="{{ route('admin.customer.delete',  $customer->id) }}" method="post"
                                    onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="bg-red-500 hover:bg-red-700 p-2 w-8 h-8 rounded-full flex items-center">
                                        <i class="ri-delete-bin-line text-white"></i>
                                    </button>
                                </form>

                            </td>
                            @else
                            <td class="px-2 py-2  text-center  action-buttons border border-gray-300">

                             <!-- Delete Icon -->
                             <form action="{{ route('admin.customer.delete', ' $customer->id') }}" method="post"
                                    onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="bg-red-500 hover:bg-red-700 p-2 ml-11 w-8 h-8 rounded-full flex items-center">
                                        <i class="ri-delete-bin-line text-white"></i>
                                    </button>
                                </form>

                            </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


    </div>

    
   



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
