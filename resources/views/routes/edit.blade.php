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
        <form action="{{ route('routes.update', $route->id) }}" method="post">
            @csrf
            @method('PUT')

            {{-- <div class="form-group">
                <label for="origin_city_id ">Select Origin City</label>
                <select name="origin_city_id " id="origin_city_id " class="form-input" required>
                    <option value="">Select Origin City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ $city->id == $route->origin_city_id ? 'selected' : '' }}>
                            {{ $city->city_name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="form-group">
                <label for="route">Route</label>
                <input id="route" type="text" class="form-input" name="route" value="{{ $route->route }}"
                    required>
            </div>

            <div class="form-group">
                <label for="origin_city_id ">Select Origin City</label>
                <select name="origin_city_id" id="origin_city_id" class="form-input" required>
                    <option value="">Select Origin City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ $city->id == $route->origin_city_id ? 'selected' : '' }}>
                            {{ $city->city_name }}</option>
                    @endforeach
                </select>
            </div>



            <div class="form-group">
                <label for="destination_city_id">Select Destination City</label>
                <select name="destination_city_id" id="destination_city_id" class="form-input" required>
                    <option value="">Select Destination City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}"
                            {{ $city->id == $route->destination_city_id ? 'selected' : '' }}>{{ $city->city_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fare">Fare</label>
                <input id="fare" type="number" class="form-input" name="fare" value="{{ $route->fare }}">
            </div><br>

            <div class="form-group">
                <label for="border_id">Border</label>
                <select name="border_id" class="form-input" id="border_id" required>
                    <option value="">Select Border</option>
                    @foreach ($borders as $border)
                        <option value="{{ $border->id }}" {{ $border->id == $route->border_id ? 'selected' : '' }}>
                            {{ $border->border_name }}</option>
                    @endforeach
                </select>
            </div><br>

            <button type="submit" class="btn btn-primary">Update Route</button>
        </form>
    </div>

</x-layout.default>


<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#border_id').select2({
            tags: true,
            tokenSeparators: [',', ' '], // Allow multiple tags to be entered with comma or space
            templateSelection: function(selection) {
                return $('<span>' + selection.text + '</span>');
            }
        });
    });
</script>
