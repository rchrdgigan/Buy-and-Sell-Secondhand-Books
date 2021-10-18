<?php

namespace App\Http\Controllers;
use App\Models\ShopBook;
use App\Models\CartBook;
use App\Models\Shop;
use App\Models\Book;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function mainPageBooks()
    {
        
        $shop_book = ShopBook::get();
        $shop_book->map(function ($item){
            $item_book = Book::findorfail($item->book_id);
            $item->name = $item_book->name;
            $item->unit_price = $item_book->unit_price;
            $item->image = $item_book->image;
            $item_shop = Shop::findorfail($item->shop_id);
            $item->shop_name = $item_shop->name;
        });
        return view('welcome',compact('shop_book'));
    }

    public function buyBooks($id)
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
            $item_shop = Shop::findorfail($item->shop_id);
            $item->shop_name = $item_shop->name;
        });
        foreach($shop_book as $cat){
            $book = Book::where('category', $cat->category)->get();
            $book->map(function ($item){
                $shop_book = $item->shop_book;
                $shop_book->map(function ($itemShop){
                    $itemShop->shop_user_id = $itemShop->id;
                    $shop = Shop::findOrFail($itemShop->shop_id);
                    $itemShop->shop_name = $shop->name;
                });
            });

            return view('view-book-item',compact('shop_book','book'));
        }
    }

}
