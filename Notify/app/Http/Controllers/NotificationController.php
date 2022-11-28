<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\NewOrders;

class NotificationController extends Controller
{
    public function sendNotification()
    {
        $user = "mribrahim@mail.com";
        $order = [
            'greeting' => 'Hello Mr Ibrahim',
            'body' => 'A new order has been placed',
            'lastline' => 'Thank you'
        ];
        Order::send($order, new NewOrders($order));
        return back()->with('success', 'Notification sent successfully');
    }
}
