<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay($order)
{
    Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $params = [
        'transaction_details' => [
            'order_id' => $order->no_order,
            'gross_amount' => $order->total_harga
        ],
        'customer_details' => [
            'first_name' => $order->nama_pelanggan
        ]
    ];

    return Snap::getSnapToken($params);
}
}
