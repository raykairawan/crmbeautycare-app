<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('admin.appointments.index', compact('appointments'));
    }

    public function indexUser()
    {
        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view('users.appointments', compact('appointments'));
    }

    public function store(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'reservation_date' => 'required|date_format:m/d/Y',
            'reservation_time' => 'required|date_format:h:i A',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id'
        ]);

        $user = Auth::user();

        $reservation_date = \Carbon\Carbon::createFromFormat('m/d/Y', $validatedData['reservation_date'])->format('Y-m-d');
        $reservation_time = \Carbon\Carbon::createFromFormat('h:i A', $validatedData['reservation_time'])->format('H:i:s');

        $appointment = Appointment::create([
            'name' => $user->name,
            'no_tlp' => $user->phone,
            'reservation_date' => $reservation_date,
            'reservation_time' => $reservation_time,
            'category_id' => $category->id,
            'status' => 0,
            'user_id' => $user->id,
        ]);

        // Menambahkan produk ke appointment
        $appointment->products()->attach($validatedData['product_ids']);

        return redirect()->route('appointments.indexUser')->with('success', 'Appointment berhasil dibuat');
    }

    public function destroy(Appointment $appointment)
    {
        $this->authorize('delete', $appointment);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
