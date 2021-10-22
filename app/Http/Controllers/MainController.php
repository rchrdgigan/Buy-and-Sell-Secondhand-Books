<?php

namespace App\Http\Controllers;
use App\Models\ShopBook;
use App\Models\CartBook;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Book;
use App\Models\User;
use App\Models\ShopBookCategory;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //Show Main page
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
        
        //Initializing caterogry and shop
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();
        return view('welcome',compact('shop_book','category','shop'));
    }

    //Show individual book page to buy
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

        //Initializing book related on each category
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
            
            //Initializing caterogry and shop
            $category = Category::with('assign_book_category')->get();
            $shop = Shop::with('shop_book')->get();

            return view('view-book-item',compact('shop_book','book','category','shop'));
        }
    }

    //Checkout book
    public function checkoutBooks(Request $request, $id)
    {
        $book = ShopBook::where('id', $id)->get();
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
            return redirect()->route('view.book.item',$id)->with('message', 'Your quantity of purchase cannot be 0. Please choose quantity 1 to '.$data->quantity.' only. Thanks!');
        }elseif($data->quantity >= $quantity_temp ){
            $quantity = $quantity_temp;
            $total = $request->quantity * $data->unit_price;
            return view('billing',compact('book','quantity','total'));
        }else{
            return redirect()->route('view.book.item',$id)->with('message', 'Your quantity of purchase cannot be higher in the number of books for sale. Please choose quantity 1 to '.$data->quantity.' only. Thanks!');
        }
        
    }

    //Display all books in filter category page
    public function allBooks()
    {
        $sortBy = "asc";
        $shop_book = ShopBook::paginate(12);
        $shop_book->map(function ($item){
            $item_book = Book::findorfail($item->book_id);
            $item->name = $item_book->name;
            $item->unit_price = $item_book->unit_price;
            $item->image = $item_book->image;
            $item_shop = Shop::findorfail($item->shop_id);
            $item->shop_name = $item_shop->name;
        });

        //Initializing caterogry and shop
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();
        return view('filter-categories',compact('shop_book','category','shop','sortBy'));
    }

    //Filter A-Z and Z-A All Books
    public function bookAllSort()
    {
        if($_GET['sortBy'] == "a-z"){
            $sortBy = "asc";
        }elseif($_GET['sortBy'] == "z-a"){
            $sortBy = "desc";
        }
        $shop_book = ShopBook::paginate(12);
        $shop_book->map(function ($item){
            $item_book = Book::findorfail($item->book_id);
            $item->name = $item_book->name;
            $item->unit_price = $item_book->unit_price;
            $item->image = $item_book->image;
            $item_shop = Shop::findorfail($item->shop_id);
            $item->shop_name = $item_shop->name;
        });
        
        //Initializing caterogry and shop
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();
        return view('filter-categories',compact('shop_book','category','shop','sortBy'));
        
    }

    //Filter by category of book
    public function bookCategory($name)
    {
        $category_title = $name;
        $shop_book = Book::with('shop_book')->where('category', $category_title)->paginate(12);
        
        //Initializing caterogry and shop
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();

        return view('filtered-categories',compact('shop_book','category','shop','category_title'));
    }

    //Filter A-Z and Z-A with Category Book Title
    public function bookSort($name)
    {
        $category_title = $name;
        if($_GET['sortBy'] == "a-z"){
            $sortBy = "asc";
        }elseif($_GET['sortBy'] == "z-a"){
            $sortBy = "desc";
        }
        $shop_book = Book::with('shop_book')->where('category', $category_title)->orderBy('name',$sortBy)->paginate(12);
        
        //Initializing caterogry and shop
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();

        return view('filtered-categories',compact('shop_book','category','shop','category_title'));
    }

    //Filter by shop
    public function shopCategory($name)
    {
        $users = User::get();
        //To get the designated user of shop
        $shop_name = Shop::with('user_shop')->where('name',$name)->get();
        $shop_name->map(function ($item){
            $user = $item->user_shop;
            $user->map(function($itemUser){
                $user_data = User::findOrFail($itemUser->user_id);
                $itemUser->first_name = $user_data->first_name;
                $itemUser->middle_name = $user_data->middle_name;
                $itemUser->last_name = $user_data->last_name;
                $itemUser->email = $user_data->email;
            });
        });

        foreach($shop_name as $data)
        $book = ShopBook::where('shop_id', $data->id)->get();
        $book->map(function ($item){
            $item_book = Book::findorfail($item->book_id);
            $item->name = $item_book->name;
            $item->unit_price = $item_book->unit_price;
            $item->image = $item_book->image;
            $item_shop = Shop::findorfail($item->shop_id);
            $item->shop_name = $item_shop->name;
        });
        $shop_book = Book::with('shop_book')->where('category', $name)->paginate(12);

        $shop_book_cat = Category::with('shop_book_category')->get();
        
        //Initializing caterogry and shop
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();

        return view('seller-shop',compact('shop_book','category','shop','book','users','shop_name','shop_book_cat'));
    }

    //Filter by shop
    public function shopBookCategory($name,$parm1,$parm2)
    {
        $users = User::get();
        //To get the designated user of shop
        $shop_name = Shop::with('user_shop')->where('name',$name)->get();
        $shop_name->map(function ($item){
            $user = $item->user_shop;
            $user->map(function($itemUser){
                $user_data = User::findOrFail($itemUser->user_id);
                $itemUser->first_name = $user_data->first_name;
                $itemUser->middle_name = $user_data->middle_name;
                $itemUser->last_name = $user_data->last_name;
                $itemUser->email = $user_data->email;
            });
        });
        
        // an param1 equal sa category name and an param 2 eqaul sa shop id
        // return [$parm1,$parm2];
        $category = Category::where('category_title',$parm1)->get();
        foreach($category as $data)
        $book = ShopBookCategory::where('shop_id', $parm2)->where('category_id', $data->id)->get();
        $book->map(function ($item){
            $item_book = Book::findorfail($item->book_id);
            $item->name = $item_book->name;
            $item->unit_price = $item_book->unit_price;
            $item->image = $item_book->image;
            $item_shop = Shop::findorfail($item->shop_id);
            $item->shop_name = $item_shop->name;
        });

        $shop_book_cat = Category::with('shop_book_category')->get();

        //Initializing caterogry and shop
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();
        return view('seller-shop',compact('book','category','shop_name','shop','users','shop_book_cat'));
    }


}
