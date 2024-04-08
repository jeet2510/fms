<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Route;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Border;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        $routes = Route::all();
        $clients = Client::all();
        $drivers = Driver::all();
        $bookings = Booking::all();
        return view('bookings.index', compact('customers', 'routes', 'clients', 'drivers', 'bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (Request $request)
    {

        // dd('ok');
        // Validate incoming request
        $validatedData = $request->validate([
            'booking_id' => 'required|string',
            'date' => 'required|string',
            'customer_id' => 'required',
            'receiver_id' => 'required|string',
            'driver_id' => 'nullable|array', // Accepts an array of driver_ids
            'route_id' => 'required|string',
            'buying_amount' => 'required|string',
            'border_charges' => 'required|string',
            'total_booking_amount' => 'required|string',
        ]);

        // dd('ok');

        // Create a new Customer instance
        $booking = new Booking();
        $booking->booking_id = $validatedData['booking_id'];
        $booking->date = $validatedData['date'];
        $booking->customer_id = $validatedData['customer_id'];
        $booking->receiver_id = $validatedData['receiver_id'];
        $booking->driver_id = implode(',', $validatedData['driver_id']);
        $booking->route_id = $validatedData['route_id'];
        $booking->buying_amount = $validatedData['buying_amount'];
        $booking->border_charges = $validatedData['border_charges'];
        $booking->total_booking_amount = $validatedData['total_booking_amount'];

        // $booking->created_by = Auth::user()->creatorId();


        // Save the booking
        $booking->save();

        // Return a response
        return redirect()->route('bookings.index')->with('success', 'Border created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function update(Request $request, string $id)
    {
        // Find the route by its ID
        $booking = Booking::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([

            'booking_id' => 'required|string',
            'date' => 'required|string',
            'customer_id' => 'required|email|unique:email',
            'receiver_id' => 'required|string',
            'driver_id' => 'nullable|string',
            'route_id' => 'required|string',
            'buying_amount' => 'required|string',
            'border_charges' => 'required|string',
            'total_booking_amount' => 'required|string',
        ]);

        // Update the route with the validated data
        $booking->update($validatedData);

        // Return a response indicating success
         return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
}

    /**
     * Update the specified resource in storage.
     */
    public function destroy($id)
    {
      $booking = Booking::find($id);
      $booking->delete();
      return redirect()->route('bookings.index')
        ->with('success', 'Booking deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function create()
    {
        $customers = Customer::all();
        $routes = Route::all();
        $clients = Client::all();
        $drivers = Driver::all();
        $borders = Border::all();


        return view('bookings.create', compact('customers', 'routes', 'clients', 'drivers', 'borders'));
    }

  public function show($id)
  {
    $booking = Booking::find($id);
    return view('bookings.show', compact('booking'));
  }

  public function edit($id)
  {
    $booking = Booking::find($id);
    return view('bookings.edit', compact('booking'));
  }

  public function getDriverDetails($id) {
    $driver = Driver::find($id);

    if($driver) {
        return response()->json(['success' => true, 'driver' => $driver]);
    } else {
        return response()->json(['success' => false]);
    }
}


}
