<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\ShopBook;
use App\Models\Cart;
use App\Models\Book;
use App\Models\CartBook;
use App\Models\UserShop;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $shop = UserShop::where('user_id', auth()->user()->id)->first();
        if(!$shop == null){
            $shop_info = Shop::where('id', $shop->shop_id)->first();
            return view('my-shop',compact('shop_info','shop'));
        }else{
            return view('my-shop', compact('shop'));
        }
    }
    public function shopInfo(Request $request)
    {
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
            return back()->with('message','Shop added successfully!');
        }else {
            $user_shop = UserShop::where('user_id', auth()->user()->id)->first();
            $shop_update = Shop::findOrFail($user_shop->shop_id);
            $shop_update->name = $request->name;
            $shop_update->address = $request->address;
            $shop_update->update();
            return back()->with('message','Shop update successfully!');
        }
    }

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

        $cart = CartBook::where('user_id', auth()->user()->id)->get();
        $cart->map(function($itemBook){
            $my_cart = Cart::findOrFail($itemBook->cart_id);
            $itemBook->quantity = $my_cart->quantity;
            $itemBook->total_amount = $my_cart->total_amount;
            $my_book = Book::findOrFail($itemBook->book_id);
            $itemBook->name = $my_book->name;
            $itemBook->unit_price = $my_book->unit_price;
            $itemBook->image = $my_book->image;
        });
        return view('cart',compact('cart'));
    }

    public function delShopping(Request $request)
    {
        $cart = Cart::findOrfail($request->id);
        $cart->delete();
        return redirect()->route('cart')->with('message','Book has been deleted!');
    }

    public function diplayShopping(Request $request)
    {
        $cart = CartBook::where('user_id', auth()->user()->id)->get();
        $cart->map(function($itemBook){
            $my_cart = Cart::findOrFail($itemBook->cart_id);
            $itemBook->quantity = $my_cart->quantity;
            $my_book = Book::findOrFail($itemBook->book_id);
            $itemBook->name = $my_book->name;
            $itemBook->unit_price = $my_book->unit_price;
            $itemBook->image = $my_book->image;
        });
        return view('cart',compact('cart'));
    }

}
