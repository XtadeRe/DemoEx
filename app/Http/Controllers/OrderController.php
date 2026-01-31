<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Orders;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index() {
        $orders = Orders::where('user_id', auth()->id())->with('comment')->get();
        return view('orders', compact('orders'));
    }

    public function store(Request $request) {
        Orders::create($request->all());
        return redirect()->route('order.index');
    }

    public function addComment(Request $request) {
        Comments::create([
            'user_id'  => auth()->id(),
            'order_id' => $request->order_id,
            'comment'  => $request->comment,
        ]);
        return redirect()->route('order.index');
    }
    public function update(Request $request, $id) {
        $order = Orders::findOrFail($id);
        $order->update(['status' => $request->status]);
        return redirect()->route('order.index');
    }


}
