<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Visitor;

class AdminDashboard extends Controller
{
    public function index()
    {
        $fresh = Order::getFreshOrders();
        $finished = Order::getFinishedOrders();
        $visitors = Visitor::all()->count();

        return view('admin.index', compact('fresh','finished', 'visitors'));
    }
}
