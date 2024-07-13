<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = env('MIDTRANS_IS_SANITIZED', true);
        Config::$is3ds = env('MIDTRANS_IS_3DS', true);
    }

    public function pay(Request $request, $appointment_id)
    {
        $appointment = Appointment::with('products')->findOrFail($appointment_id);
        $order_id = uniqid();

        // Menghitung total harga dari produk yang terkait dengan appointment
        $totalAmount = $appointment->products->sum('price');
    
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $totalAmount,
            ],
            'customer_details' => [
                'first_name' => $appointment->name,
                'phone' => $appointment->no_tlp,
            ],
        ];
    
        $appointment->status = 1;
        $appointment->save();

        $snapToken = Snap::getSnapToken($params);

        return view('payment', compact('snapToken', 'appointment'));
    }
    

    public function callback(Request $request)
    {
        \Log::info('Midtrans Callback: ', $request->all());

        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            $appointment = Appointment::find($request->order_id);
            if ($appointment) {
                if (in_array($request->transaction_status, ['capture', 'settlement'])) {
                    $appointment->status = 1;
                    $appointment->save();
                }
            }
        }

        return response()->json(['message' => 'OK']);
    }
}
