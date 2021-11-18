<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\User;
use App\Models\Category;
use App\Models\ShopBook;
use App\Models\Cart;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\UserTransaction;
use App\Models\CartBook;
use App\Models\UserShop;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    //Validate Shop
    public function index() {
        $shop = UserShop::where('user_id', auth()->user()->id)->first();
        if(!$shop == null){
            $shop_info = Shop::where('id', $shop->shop_id)->first();
            return view('my-shop',compact('shop_info','shop'));
        }else{
            return view('my-shop', compact('shop'));
        }
    }

    //Create Shop
    public function shopInfo(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:shops'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        $user_shop = UserShop::where('user_id', auth()->user()->id)->get();
        if($user_shop->isEmpty()){
            $shop = Shop::create([
                'name' => $request->name,
                'address' => $request->address,
            ]);
            UserShop::create([
                'shop_id'=> $shop->id,
                'user_id'=> auth()->user()->id,
            ]);
            return redirect()->route('sell.book')->with('message','Shop created successfully! You can now add your book for sale.');
        }else {
            $user_shop = UserShop::where('user_id', auth()->user()->id)->first();
            $shop_update = Shop::findOrFail($user_shop->shop_id);
            $shop_update->name = $request->name;
            $shop_update->address = $request->address;
            $shop_update->update();
            return back()->with('message','Shop update successfully!');
        }
    }

    //Add to Cart
    public function cartShopping($id)
    {
        $shop_book = ShopBook::where('id', $id)->get();
        $shop_book->map(function ($item){
            $item_book = Book::findorfail($item->book_id);
            $item->name = $item_book->name;
            $item->unit_price = $item_book->unit_price;
            $item->quantity = $item_book->quantity;
            $item->description = $item_book->description;
            $item->details = $item_book->details;
            $item->category = $item_book->category;
            $item->image = $item_book->image;
        });
        foreach($shop_book as $data){
            $abc = CartBook::where('user_id',auth()->user()->id)->where('book_id',$data->book_id)->get();
            if($abc->isEmpty()){
                $cart = Cart::create([
                    'shop_book_id' => $id,
                    'title' => $data->name,
                    'unit_price' => $data->unit_price,
                    'quantity'=> "1",
                    'total_amount' => $data->unit_price,
                    'image'=> $data->image,
                ]);
                $cart_book = CartBook::create([
                    'user_id' => auth()->user()->id,
                    'cart_id' => $cart->id, 
                    'book_id' => $data->book_id, 
                ]);
            }else {
                $abc->map(function($itemCart){
                    $my_cart = Cart::findOrFail($itemCart->cart_id);
                    $itemCart->quantity = $my_cart->quantity;
                    $itemCart->total_amount = $my_cart->total_amount;
                });
                foreach($abc as $efg){
                    $cart = Cart::findOrFail($efg->cart_id);
                    $cart->quantity = $efg->quantity + 1;
                    $cart->total_amount = $data->unit_price * $cart->quantity;
                    $cart->update();
                }
            }
        }

        //Show list of book in cart to the designated user
        $cart = CartBook::where('user_id', auth()->user()->id)->get();
        $cart->map(function($itemBook){
            $my_cart = Cart::findOrFail($itemBook->cart_id);
            $itemBook->quantity = $my_cart->quantity;
            $itemBook->shop_book_id = $my_cart->shop_book_id;
            $itemBook->total_amount = $my_cart->total_amount;
            $my_book = Book::findOrFail($itemBook->book_id);
            $itemBook->name = $my_book->name;
            $itemBook->unit_price = $my_book->unit_price;
            $itemBook->image = $my_book->image;
        });

        //Initializing caterogry and shop
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();
        
        return redirect()->route('cart')->with('message','Book has been added!');
    }

    //Remove to Cart
    public function delShopping(Request $request)
    {
        $cart = Cart::findOrfail($request->id);
        $cart->delete();
        return redirect()->route('cart')->with('message','Book has been deleted!');
    }

    //Checkout Cart
    public function checkoutCart(Request $request)
    {
        $book = ShopBook::where('id', $request->shop_book_id)->get();
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();
        $book->map(function ($item){
            $item_book = Book::findorfail($item->book_id);
            $item->name = $item_book->name;
            $item->quantity = $item_book->quantity;
            $item->unit_price = $item_book->unit_price;
            $item->image = $item_book->image;
            $item_shop = Shop::findorfail($item->shop_id);
            $item->shop_name = $item_shop->name;
        });
        foreach($book as $data)
        $quantity_temp = $request->quantity;
        if($quantity_temp <= 0){
            return redirect()->route('cart')->with('message', 'Your quantity of purchase cannot be 0. Please choose quantity 1 to '.$data->quantity.' only. Thanks!');
        }elseif($data->quantity >= $quantity_temp ){
            $cart = Cart::findOrfail($request->id);
            $cart->delete();
            $quantity = $quantity_temp;
            $total = $request->quantity * $data->unit_price;
            return view('billing',compact('book','quantity','total','category','shop'));
        }else{
            return redirect()->route('cart')->with('message', 'Your quantity of purchase cannot be higher in the number of books for sale. Please choose quantity 1 to '.$data->quantity.' only. Thanks!');
        }
    }

    //Display Cart
    public function diplayShopping(Request $request)
    {
        $cart = CartBook::where('user_id', auth()->user()->id)->get();
        $cart->map(function($itemBook){
            $my_cart = Cart::findOrFail($itemBook->cart_id);
            $itemBook->quantity = $my_cart->quantity;
            $itemBook->shop_book_id = $my_cart->shop_book_id;
            $itemBook->total_amount = $my_cart->total_amount;
            $my_book = Book::findOrFail($itemBook->book_id);
            $itemBook->name = $my_book->name;
            $itemBook->unit_price = $my_book->unit_price;
            $itemBook->image = $my_book->image;
        });
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();
        return view('cart',compact('cart','category','shop'));
    }

    //Buy book for pending transaction
    public function addTransaction(Request $request)
    {
        $user = ShopBook::where('book_id', $request->book_id)->where('user_id', auth()->user()->id)->get();
        if($user->isEmpty())//Auth User can't buy thier own book
        {
            //Find Book
            $book = Book::findOrFail($request->book_id);
            $new_quantity = $book->quantity - $request->quantity;
            $new_total_p = $book->total_amount - $request->total_price;
            $transaction = Transaction::create([
                'book_title' => $book->name,
                'unit_price'=> $book->unit_price,
                'quantity'=> $request->quantity,
                'total_price'=> $request->total_price,
                'status'=> 'pending',
            ]);
            $user_trasaction = UserTransaction::create([
                'transaction_id' => $transaction->id,
                'user_id' => auth()->user()->id,
                'shop_id' => $request->shop_id,
                'book_id' => $request->book_id,
            ]);
            return redirect()->route('book.transaction');
        }else{
            //You're not allow to buy your own book
            return redirect()->route('book.not.allowed');
        }
    }
    
    public function showCustomer()
    {
        $shop_user = UserShop::where('user_id', auth()->user()->id)->first();
        $customer = UserTransaction::with('transaction')->where('shop_id', $shop_user->shop_id)->get();
        $customer->map(function($item_customer){
            $customer_info = User::findOrFail($item_customer->user_id);
            $item_customer->user_image = $customer_info->image;
            $item_customer->first_name = $customer_info->first_name;
            $item_customer->middle_name = $customer_info->middle_name;
            $item_customer->last_name = $customer_info->last_name;
            $item_customer->gender = $customer_info->gender;
            $item_customer->brgy = $customer_info->brgy;
            $item_customer->street = $customer_info->street;
            $item_customer->purok = $customer_info->purok;
            $item_customer->email = $customer_info->email;
            $customer_order = Book::findOrFail($item_customer->book_id);
            $item_customer->image = $customer_order->image;
            $item_customer->available = $customer_order->quantity;
            $item_customer->details = $customer_order->details;
            $item_customer->description = $customer_order->description;
            $order = $item_customer->transaction;
            $item_customer->book_title = $order->book_title;
            $item_customer->unit_price = $order->unit_price;
            $item_customer->quantity = $order->quantity;
            $item_customer->total_price = $order->total_price;
            $item_customer->status = $order->status;
        });
        return view('my-customer-list',compact('customer'));
    }

    //Update status to processing
    public function inprocessBook(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        $book->quantity = $book->quantity - $request->quantity;
        $book->total_amount = $book->total_amount - $request->total_price;
        $book->update();

        $user_order = Transaction::findOrFail($request->trans_id);
        $user_order->status = 'processing';
        $user_order->update();
        return redirect()->route('display.processing')->with('message','Please preapare your book and contact the buyer for the transaction. Thanks!');
    }

    //Display inprocessing
    public function displayInprocess()
    {
        $shop_user = UserShop::where('user_id', auth()->user()->id)->first();
        $customer = UserTransaction::with('transaction')->where('shop_id', $shop_user->shop_id)->get();
        $customer->map(function($item_customer){
            $customer_info = User::findOrFail($item_customer->user_id);
            $item_customer->user_image = $customer_info->image;
            $item_customer->first_name = $customer_info->first_name;
            $item_customer->middle_name = $customer_info->middle_name;
            $item_customer->last_name = $customer_info->last_name;
            $item_customer->gender = $customer_info->gender;
            $item_customer->brgy = $customer_info->brgy;
            $item_customer->street = $customer_info->street;
            $item_customer->purok = $customer_info->purok;
            $item_customer->email = $customer_info->email;
            $customer_order = Book::findOrFail($item_customer->book_id);
            $item_customer->image = $customer_order->image;
            $item_customer->available = $customer_order->quantity;
            $item_customer->details = $customer_order->details;
            $item_customer->description = $customer_order->description;
            $order = $item_customer->transaction;
            $item_customer->book_title = $order->book_title;
            $item_customer->unit_price = $order->unit_price;
            $item_customer->quantity = $order->quantity;
            $item_customer->total_price = $order->total_price;
            $item_customer->status = $order->status;
        });
        return view('transaction-purchase-inprocess',compact('customer'));
    }


}
