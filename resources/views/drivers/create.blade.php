<form action="{{ route('drivers.store') }}" class="ajax-form" enctype="multipart/form-data" method="post">
    @csrf
    <div class="mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="h-auto overflow-y-auto">
                <div class=" grid grid-cols-5 gap-4">
                    <!-- First Column -->
                    <div class="col-span-1">
                        <!-- Driver Name -->
                        <div class="mb-4">
                            <label for="driver_name" class="block">Driver Name:</label>
                            <input type="text" id="driver_name" class="form-input" name="driver_name">
                        </div>
                    </div>

                    <!-- Second Column -->
                    <div class="col-span-1">
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block">Email:</label>
                            <input type="email" id="email" class="form-input" name="email">
                        </div>
                    </div>

                    <!-- Third Column -->
                    <div class="col-span-1">
                        <!-- Phone Number -->
                        <div class="mb-4">
                            <label for="phone_number" class="block">Phone Number:</label>
                            <input type="text" id="phone_number" class="form-input" name="phone_number">
                        </div>
                    </div>

                    <!-- Fourth Column -->
                    <div class="col-span-1">
                        <!-- WhatsApp Number -->
                        <div class="mb-4">
                            <label for="whatsapp_number" class="block">WhatsApp Number:</label>
                            <input type="text" id="whatsapp_number" class="form-input" name="whatsapp_number">
                        </div>
                    </div>

                    <!-- Fifth Column -->
                    <div class="col-span-1">
                        <!-- Address 1 -->
                        <div class="mb-4">
                            <label for="address_1" class="block">Address 1:</label>
                            <input type="text" id="address_1" class="form-input" name="address_1">
                        </div>
                    </div>

                    <!-- Sixth Column -->
                    <div class="col-span-1">
                        <!-- Address 2 -->
                        <div class="mb-4">
                            <label for="address_2" class="block">Address 2:</label>
                            <input type="text" id="address_2" class="form-input" name="address_2">
                        </div>
                    </div>

                    <!-- Seventh Column -->
                    <div class="col-span-1">
                        <!-- Country -->
                        <div class="mb-4">
                            <label for="country" class="block">Country:</label>
                            <input type="text" id="country" class="form-input" name="country">
                        </div>
                    </div>

                    <!-- Eighth Column -->
                    <div class="col-span-1">
                        <!-- State -->
                        <div class="mb-4">
                            <label for="state" class="block">State:</label>
                            <input type="text" id="state" class="form-input" name="state">
                        </div>
                    </div>

                    <!-- Ninth Column -->
                    <div class="col-span-1">
                        <!-- City -->
                        <div class="mb-4">
                            <label for="city" class="block">City:</label>
                            <input type="text" id="city" class="form-input" name="city">
                        </div>
                    </div>

                    <!-- Tenth Column -->
                    <div class="col-span-1">
                        <!-- Truck Number -->
                        <div class="mb-4">
                            <label for="truck_number" class="block">Truck Number:</label>
                            <input type="text" id="truck_number" class="form-input" name="truck_number">
                        </div>
                    </div>

                    <!-- Eleventh Column -->
                    <div class="col-span-1">
                        <!-- Truck Type -->
                        <div class="mb-4">
                            <label for="truck_type_id" class="block">Truck Type:</label>
                            <select id="truck_type_id" class="form-input" name="truck_type_id">
                                <option value="">Select Truck Type</option>
                                @foreach ($trucks as $truck)
                                    <option value="{{ $truck->id }}">{{ $truck->truck_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Twelfth Column -->
                    <div class="col-span-1">
                        <!-- Truck Expiry Date -->
                        <div class="mb-4">
                            <label for="truck_expiry_date" class="block">Truck Expiry Date:</label>
                            <input type="date" id="truck_expiry_date" class="form-input" name="truck_expiry_date">
                        </div>
                    </div>

                    <!-- Thirteenth Column -->
                    <div class="col-span-1">
                        <!-- ID Card Number -->
                        <div class="mb-4">
                            <label for="id_card_number" class="block">ID Card Number:</label>
                            <input type="text" id="id_card_number" class="form-input" name="id_card_number">
                        </div>
                    </div>

                    <!-- Fourteenth Column -->
                    <div class="col-span-1">
                        <!-- ID Card Expiry Date -->
                        <div class="mb-4">
                            <label for="id_card_expiry_date" class="block">ID Card Expiry Date:</label>
                            <input type="date" id="id_card_expiry_date" class="form-input" name="id_card_expiry_date">
                        </div>
                    </div>

                    <!-- Fifteenth Column -->
                    <div class="col-span-1">
                        <!-- Driving License Number -->
                        <div class="mb-4">
                            <label for="driving_license_number" class="block">Driving License Number:</label>
                            <input type="text" id="driving_license_number" class="form-input" name="driving_license_number">
                        </div>
                    </div>

                    <!-- Sixteenth Column -->
                    <div class="col-span-1">
                        <!-- Driving License Expiry Date -->
                        <div class="mb-4">
                            <label for="driving_license_expiry_date" class="block">Driving License Expiry Date:</label>
                            <input type="date" id="driving_license_expiry_date" class="form-input" name="driving_license_expiry_date">
                        </div>
                    </div>

                    <!-- Seventeenth Column -->
                    <div class="col-span-1">
                        <!-- Passport Number -->
                        <div class="mb-4">
                            <label for="passport_number" class="block">Passport Number:</label>
                            <input type="text" id="passport_number" class="form-input" name="passport_number">
                        </div>
                    </div>

                    <!-- Eighteenth Column -->
                    <div class="col-span-1">
                        <!-- Passport Expiry Date -->
                        <div class="mb-4">
                            <label for="passport_expiry_date" class="block">Passport Expiry Date:</label>
                            <input type="date" id="passport_expiry_date" class="form-input" name="passport_expiry_date">
                        </div>
                    </div>

                    <!-- Nineteenth Column -->
                    <div class="col-span-1">
                        <!-- Passport -->
                        <div class="mb-4">
                            <label for="passport" class="block">Passport:</label>
                            <input type="file" id="passport" class="form-input" name="passport">
                        </div>
                    </div>

                    <!-- Twentieth Column -->
                    <div class="col-span-1">
                        <!-- ID Card -->
                        <div class="mb-4">
                            <label for="id_card" class="block">ID Card:</label>
                            <input type="file" id="id_card" class="form-input" name="id_card">
                        </div>
                    </div>

                    <!-- Twenty-First Column -->
                    <div class="col-span-1">
                        <!-- Driving License -->
                        <div class="mb-4">
                            <label for="driving_license" class="block">Driving License:</label>
                            <input type="file" id="driving_license" class="form-input" name="driving_license">
                        </div>
                    </div>

                    <!-- Twenty-Second Column -->
                    <div class="col-span-1">
                        <!-- Truck Document -->
                        <div class="mb-4">
                            <label for="truck_document" class="block">Truck Document:</label>
                            <input type="file" id="truck_document" class="form-input" name="truck_document">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="px-6 py-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
