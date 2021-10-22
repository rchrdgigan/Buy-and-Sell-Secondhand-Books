<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\UserTransaction;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function displayPending()
    {
        $user_order = UserTransaction::with('transaction')->where('user_id', auth()->user()->id)->get();
        $user_order->map(function($item_order){
            $order_from = Shop::findOrFail($item_order->shop_id);
            $item_order->shop_name = $order_from->name;
            $my_order = Book::findOrFail($item_order->book_id);
            $item_order->image = $my_order->image;
            $order = $item_order->transaction;
            $item_order->book_title = $order->book_title;
            $item_order->unit_price = $order->unit_price;
            $item_order->quantity = $order->quantity;
            $item_order->total_price = $order->total_price;
            $item_order->status = $order->status;
        });
        return view('my-purchase-pending',compact('user_order'));
    }

    public function displayCanceled()
    {
        $user_order = UserTransaction::with('transaction')->where('user_id', auth()->user()->id)->get();
        $user_order->map(function($item_order){
            $order_from = Shop::findOrFail($item_order->shop_id);
            $item_order->shop_name = $order_from->name;
            $my_order = Book::findOrFail($item_order->book_id);
            $item_order->image = $my_order->image;
            $order = $item_order->transaction;
            $item_order->book_title = $order->book_title;
            $item_order->unit_price = $order->unit_price;
            $item_order->quantity = $order->quantity;
            $item_order->total_price = $order->total_price;
            $item_order->status = $order->status;
        });
        return view('my-purchase-canceled',compact('user_order'));
    }

    public function displayInprocess()
    {
        $user_order = UserTransaction::with('transaction')->where('user_id', auth()->user()->id)->get();
        $user_order->map(function($item_order){
            $order_from = Shop::findOrFail($item_order->shop_id);
            $item_order->shop_name = $order_from->name;
            $my_order = Book::findOrFail($item_order->book_id);
            $item_order->image = $my_order->image;
            $order = $item_order->transaction;
            $item_order->book_title = $order->book_title;
            $item_order->unit_price = $order->unit_price;
            $item_order->quantity = $order->quantity;
            $item_order->total_price = $order->total_price;
            $item_order->status = $order->status;
        });
        return view('my-purchase-inprocess',compact('user_order'));
    }

    public function displayFinish()
    {
        $user_order = UserTransaction::with('transaction')->where('user_id', auth()->user()->id)->get();
        $user_order->map(function($item_order){
            $order_from = Shop::findOrFail($item_order->shop_id);
            $item_order->shop_name = $order_from->name;
            $my_order = Book::findOrFail($item_order->book_id);
            $item_order->image = $my_order->image;
            $order = $item_order->transaction;
            $item_order->book_title = $order->book_title;
            $item_order->unit_price = $order->unit_price;
            $item_order->quantity = $order->quantity;
            $item_order->total_price = $order->total_price;
            $item_order->status = $order->status;
        });
        return view('my-purchase-completed',compact('user_order'));
    }

    public function cancelBook(Request $request)
    {
        $user_order = Transaction::findOrFail($request->trans_id);
        $user_order->status = 'canceled';
        $user_order->reason  = $request->reason;
        $user_order->update();
        return redirect()->route('my.purchase.canceled')->with('message','Book order canceled!');
    }
}
