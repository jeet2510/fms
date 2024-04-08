<x-layout.default>
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.6/b-2.4.2/sl-1.7.0/datatables.min.css" />
    <link rel="stylesheet" href="Editor-2.2.2/css/editor.dataTables.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery -->
    <script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.6/b-2.4.2/sl-1.7.0/datatables.min.js"></script>
    <script src="Editor-2.2.2/js/dataTables.editor.js"></script>

    <script>
        $(document).ready(function() {
            $('#company-table').DataTable();
        });
    </script>

    <!-- forms grid -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <style>
        .container_table {
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
        }

        .alert-danger {
            color: red;
        }

        .alert-success {
            color: #5CB85C;
        }
    </style>

    <div class="p-5">
        <a href="/bookings/create" id="bookingCreateLink">Create Booking</a>
    </div>

    <div class="container_table">
        <table id="company-table" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Booking Id</th>
                    <th>Date</th>
                    <th>Route Name</th>
                    <th>No of Drivers</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($bookings as $index => $booking)
                <tr>
                    <td class="p-2">{{ $index + 1 }}</td>
                    <td>{{ optional($booking->customer)->company_name }}</td>
                    {{-- {{ dd($booking->customer) }} --}}
                    <td class="p-2">{{ $booking->booking_id }}</td>
                    <td class="p-2">{{ $booking->date }}</td>
                    <td class="p-2">{{ optional($booking->route)->route }}</td>
                    <td class="p-2">{{ $booking->driver_id }}</td>
                    <td class="p-2">{{ $booking->total_booking_amount  }}</td>
                    <td class="p-2">
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary" style="width: 50px; display: inline-block;">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="post" class="inline" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="width: 50px;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</x-layout.default>
