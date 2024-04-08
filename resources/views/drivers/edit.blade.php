<x-layout.default>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('drivers.update', $driver->id) }}" enctype="multipart/form-data" method="post" class="grid grid-cols-5 gap-4">
            @csrf
            @method('PUT')

            <div class="col-span-1">
                <label for="driver_name">Driver Name:</label>
                <input type="text" class="form-input" id="driver_name" name="driver_name" value="{{ $driver->driver_name }}">
            </div>

            <div class="col-span-1">
                <label for="email">Email:</label>
                <input type="email" class="form-input" id="email" name="email" value="{{ $driver->email }}">
            </div>

            <div class="col-span-1">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-input" id="phone_number" name="phone_number" value="{{ $driver->phone_number }}">
            </div>

            <div class="col-span-1">
                <label for="whatsapp_number">WhatsApp Number:</label>
                <input type="text" class="form-input" id="whatsapp_number" name="whatsapp_number" value="{{ $driver->whatsapp_number }}">
            </div>

            <div class="col-span-1">
                <label for="address_1">Address 1:</label>
                <input type="text" class="form-input" id="address_1" name="address_1" value="{{ $driver->address_1 }}">
            </div>

            <div class="col-span-1">
                <label for="address_2">Address 2:</label>
                <input type="text" class="form-input" id="address_2" name="address_2" value="{{ $driver->address_2 }}">
            </div>

            <div class="col-span-1">
                <label for="country">Country:</label>
                <input type="text" class="form-input" id="country" name="country" value="{{ $driver->country }}">
            </div>

            <div class="col-span-1">
                <label for="state">State:</label>
                <input type="text" class="form-input" id="state" name="state" value="{{ $driver->state }}">
            </div>

            <div class="col-span-1">
                <label for="city">City:</label>
                <input type="text" class="form-input" id="city" name="city" value="{{ $driver->city }}">
            </div>

            <div class="col-span-1">
                <label for="truck_type_id">Truck Type:</label>
                <select id="truck_type_id" class="form-input" name="truck_type_id">
                    <option value="">Select Truck Type</option>
                    @foreach ($trucks as $truckType)
                        <option value="{{ $truckType->id }}" {{ $driver->truck_type_id == $truckType->id ? 'selected' : '' }}>{{ $truckType->truck_type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-1">
                <label for="truck_number">Truck Number:</label>
                <input type="text" class="form-input" id="truck_number" name="truck_number" value="{{ $driver->truck_number }}">
            </div>

            <div class="col-span-1">
                <label for="truck_expiry_date">Truck Expiry Date:</label>
                <input type="date" class="form-input" id="truck_expiry_date" name="truck_expiry_date" value="{{ $driver->truck_expiry_date }}">
            </div>

            <div class="col-span-1">
                <label for="id_card_number">ID Card Number:</label>
                <input type="text" class="form-input" id="id_card_number" name="id_card_number" value="{{ $driver->id_card_number }}">
            </div>

            <div class="col-span-1">
                <label for="id_card_expiry_date">ID Card Expiry Date:</label>
                <input type="date" class="form-input" id="id_card_expiry_date" name="id_card_expiry_date" value="{{ $driver->id_card_expiry_date }}">
            </div>

            <div class="col-span-1">
                <label for="driving_license_number">Driving License Number:</label>
                <input type="text" class="form-input" id="driving_license_number" name="driving_license_number" value="{{ $driver->driving_license_number }}">
            </div>

            <div class="col-span-1">
                <label for="driving_license_expiry_date">Driving License Expiry Date:</label>
                <input type="date" class="form-input" id="driving_license_expiry_date" name="driving_license_expiry_date" value="{{ $driver->driving_license_expiry_date }}">
            </div>

            <div class="col-span-1">
                <label for="passport_number">Passport Number:</label>
                <input type="text" class="form-input" id="passport_number" name="passport_number" value="{{ $driver->passport_number }}">
            </div>

            <div class="col-span-1">
                <label for="passport_expiry_date">Passport Expiry Date:</label>
                <input type="date" class="form-input" id="passport_expiry_date" name="passport_expiry_date" value="{{ $driver->passport_expiry_date }}">
            </div>

            <div class="col-span-1">
                <label for="passport">Passport:</label>
                <input type="file" class="form-input" id="passport" name="passport">
                @if($driver->passport)
                    <span>{{ $driver->passport }}</span>
                @endif
            </div><br>

            <div class="col-span-1">
                <label for="id_card">ID Card:</label>
                <input type="file" class="form-input" id="id_card" name="id_card">
                @if($driver->id_card)
                    <span>{{ $driver->id_card }}</span>
                @endif
            </div><br>

            <div class="col-span-1">
                <label for="driving_license">Driving License:</label>
                <input type="file" class="form-input" id="driving_license" name="driving_license">
                @if($driver->driving_license)
                    <span>{{ $driver->driving_license }}</span>
                @endif
            </div><br>

            <div class="col-span-1">
                <label for="truck_document">Truck Document:</label>
                <input type="file" class="form-input" id="truck_document" name="truck_document">
                @if($driver->truck_document)
                    <span>{{ $driver->truck_document }}</span>
                @endif
            </div>

            <div class="col-span-5">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</x-layout.default>
