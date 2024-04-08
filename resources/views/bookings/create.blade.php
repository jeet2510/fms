<x-layout.default>
    <style>
        .overflow-x-auto {
            width: 100%;
            overflow-x: auto;
        }
    </style>

    <div class="container mx-auto">
        <form action="{{ route('bookings.store') }}" method="post">
            @csrf

            <div class="grid grid-cols-3 gap-4">
                <div class="mb-4">
                    <label for="booking_id" class="block text-gray-700">Booking ID</label>
                    <input type="text" name="booking_id" id="booking_id"
                        value="BOOK-{{ time() }}-{{ mt_rand(100, 999) }}" class="form-select mt-1 block w-full"
                        required readonly>
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-gray-700">Date</label>
                    <input type="date" name="date" id="date" class="form-select mt-1 block w-full" required>
                </div>

                <div class="mb-4">
                    <label for="route_id" class="block text-gray-700">Route</label>
                    <select name="route_id" id="route_id" class="form-select mt-1 block w-full">
                        <option value="">Select Route</option>
                        @foreach ($routes as $route)
                            <option value="{{ $route->id }}"
                                data-border-charges="{{ $route->border->border_charges }}">{{ $route->route }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">

                <div class="mb-4">
                    <label for="customer_id" class="block text-gray-700">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select mt-1 block w-full">
                        <option value="">Select Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->company_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="receiver_id" class="block text-gray-700">Receiver</label>
                    <select name="receiver_id" id="receiver_id" class="form-select mt-1 block w-full">
                        <option value="">Select Receiver</option>
                        @foreach ($clients as $receiver)
                            <option value="{{ $receiver->id }}">{{ $receiver->company_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="mb-4">
                <label for="driver_id" class="block text-gray-700">Driver</label>
                <select name="driver_id[]" id="driver_id" class="form-select mt-1 block w-full" multiple>
                    <option value="">Select Driver</option>
                    @foreach ($drivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->driver_name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="overflow-x-auto">
                <table id="selectedDriversTable" class="hidden">
                    <thead>
                        <tr>
                            <th class="border p-4">Driver Name</th>
                            <th class="border p-4">Passport</th>
                            <th class="border p-4">Passport EXPIRE AT:</th>
                            <th class="border p-4">ID Card</th>
                            <th class="border p-4">ID Card EXPIRE AT:</th>
                            <th class="border p-4">Driver License</th>
                            <th class="border p-4">Driver License EXPIRE AT:</th>
                            <th class="border p-4">Truck Documents</th>
                            {{-- <th class="border p-4">Vehicle Documents EXPIRE AT:</th> --}}
                            <th class="border p-4">Buying Amount </th>
                            <th class="border p-4">Border Charges </th>
                            <th class="border p-4">Total </th>
                        </tr>
                    </thead>
                    <tbody id="driverData">

                    </tbody>
                </table>
            </div>


            <br>
            <div class="grid grid-cols-3 gap-4">

                <div class="mb-4">
                    <label for="buying_amount" class="block text-gray-700">Buying Amount</label>
                    <input type="text" name="buying_amount" id="buying_amount" class="form-input mt-1 block w-full"
                        >
                </div>

                <div class="mb-4">
                    <label for="border_charges" class="block text-gray-700">Border Charges</label>
                    <input type="text" name="border_charges" id="border_charges" class="form-input mt-1 block w-full"
                        >
                </div>

                <div class="mb-4">
                    <label for="total_booking_amount" class="block text-gray-700">Total Booking Amount</label>
                    <input type="text" name="total_booking_amount" id="total_booking_amount"
                        class="form-input mt-1 block w-full" required>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            $('#driver_id').change(function() {
                var selectedDrivers = $(this).val();

                if (selectedDrivers && selectedDrivers.length > 0) {
                    // Clear previous data in the table
                    $('#driverData').html('');

                    // Iterate over each selected driver
                    selectedDrivers.forEach(function(driverId) {
                        $.ajax({
                            type: 'GET',
                            url: '/get-driver-details/' + driverId,
                            success: function(data) {
                                if (data.success) {
                                    var driverData = data.driver;

                                    // Append driver details to the table
                                    var row = $('<tr>' +
                                        '<td class="border p-4">' + driverData
                                        .driver_name + '</td>' +
                                        '<td class="border p-4">' + driverData
                                        .passport + '</td>' +
                                        '<td class="border p-4">' + driverData
                                        .passport_expiry_date + '</td>' +
                                        '<td class="border p-4">' + driverData
                                        .id_card + '</td>' +
                                        '<td class="border p-4">' + driverData
                                        .id_card_expiry_date + '</td>' +
                                        '<td class="border p-4">' + driverData
                                        .driving_license_number + '</td>' +
                                        '<td class="border p-4">' + driverData
                                        .driving_license_expiry_date + '</td>' +
                                        '<td class="border p-4">' + driverData
                                        .truck_document + '</td>' +
                                        '        <td class="border p-4"><input type="number" style="width: 68px;" name="semi_buying_amount" class="semi_buying_amount form-input mt-1 block w-full" value="0" required></td>' +
                                        '<td class="border p-4"><input type="text" style="width: 69px; name="semi_border_charges" class="semi_border_charges form-input mt-1 block w-full" value="0"  readonly></td>' +
                                        '<td colspan="2" class="border p-4"><input type="number" style="width: 7rem;" name="semi_border_charges" class="semi_total_booking_amount form-input mt-1 block w-full" value="0" required readonly></td>' +
                                        '</tr>');

                                    $('#driverData').append(row);

                                    // Event listeners for changes in semi_buying_amount and semi_border_charges
                                    row.find(
                                            '.semi_buying_amount, .semi_border_charges')
                                        .on('input', function() {
                                            var buyingAmount = parseFloat($(row)
                                                .find('.semi_buying_amount')
                                                .val()) || 0;
                                            var borderCharges = parseFloat($(row)
                                                .find('.semi_border_charges')
                                                .val()) || 0;
                                            var totalBookingAmount = buyingAmount +
                                                borderCharges;
                                            $(row).find(
                                                    '.semi_total_booking_amount')
                                                .val(totalBookingAmount);
                                        });
                                } else {
                                    // Handle case when data is not found
                                    $('#driverData').append(
                                        '<tr><td colspan="11">Driver data not found</td></tr>'
                                    );
                                }
                            }
                        });
                    });
                } else {
                    // Clear the table if no drivers are selected
                    $('#driverData').html('');
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const selectElement = document.getElementById('driver_id');
            const tableElement = document.getElementById('selectedDriversTable');
            const tbodyElement = tableElement.querySelector('tbody');

            selectElement.addEventListener('change', function() {
                const selectedOptions = Array.from(this.selectedOptions);

                // Clear existing rows
                tbodyElement.innerHTML = '';

                // Show table if options are selected, otherwise hide it
                if (selectedOptions.length > 0) {
                    tableElement.classList.remove('hidden');
                    // Fetch data for each selected option
                    selectedOptions.forEach(option => {
                        fetchData(option.value);
                    });
                } else {
                    tableElement.classList.add('hidden');
                }
            });

            // Function to fetch data from server
            function fetchData(driverId) {
                // Make an AJAX request to fetch data for the selected driver
                // Replace 'your_backend_endpoint_url' with your actual backend endpoint URL
                fetch( '/get-driver-details/' + driverId)
                    .then(response => response.json())
                    .then(data => {
                        // Update table with fetched data
                        const row = document.createElement('tr');
                        const cell = document.createElement('td');
                        cell.textContent = data.driver_name; // Assuming your response includes driver name
                        row.appendChild(cell);
                        tbodyElement.appendChild(row);
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }
        });

        document.getElementById('route_id').addEventListener('change', function() {
            var selectedRoute = this.options[this.selectedIndex];
            var borderCharges = selectedRoute.getAttribute('data-border-charges');

            // Select all elements with the class name 'semi_border_charges' and update their values
            var borderChargeInputs = document.getElementsByClassName('semi_border_charges');
            for (var i = 0; i < borderChargeInputs.length; i++) {
                borderChargeInputs[i].value = borderCharges;
            }
        });


    </script>
</x-layout.default>
