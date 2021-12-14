<?php

namespace App\Http\Controllers;
use App\Models\UserShop;
use App\Models\ShopBook;
use App\Models\ShopBookCategory;
use App\Models\AssignBookCategory;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $book = ShopBook::where('user_id', auth()->user()->id)->get();
        $book->map(function($itemBook){
            $my_book = Book::findOrFail($itemBook->book_id);
            $itemBook->name = $my_book->name;
            $itemBook->description = $my_book->description;
            $itemBook->details = $my_book->details;
            $itemBook->quantity = $my_book->quantity;
            $itemBook->category = $my_book->category;
            $itemBook->unit_price = $my_book->unit_price;
            $itemBook->total_amount = $my_book->total_amount;
            $itemBook->image = $my_book->image;
        });
        $category = Category::get();
        return view('add-to-sell',compact('book','category'));
    }

    public function create(Request $request)
    {
        $user_shop = UserShop::where('user_id', auth()->user()->id)->get();
        if($user_shop->isEmpty()){
            return back()->with('message','Please set your shop information. Before you sell books. Thanks!');
        }else {
            $validated = $request->validate([
                'name' => ['required','max:999'],
                'description' => ['required','max:999'],
                'details' => ['required','max:999'],
                'quantity' => ['required','max:999'],
                'categories' => ['required','max:999'],
                'unit_price' => ['required','max:999'],
                'total_amount' => ['required','max:999'],
                'image'         => 'nullable|image|file|max:5000',
            ]);
            if($request->hasFile('image'))
            {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/book_image/',$fileNameToStore);
            }
            else
            {
                $fileNameToStore = 'noimage.png';
            }
            $book = Book::create([
                'name' => $request->name,
                'description' => $request->description,
                'details' => $request->details,
                'quantity' => $request->quantity,
                'category' => $request->categories,
                'unit_price' => $request->unit_price,
                'total_amount' => $request->total_amount,
                'image' => $fileNameToStore,
            ]);
            $s_id = UserShop::where('user_id', auth()->user()->id)->first();
            $shop_book = ShopBook::create([
                'user_id' => auth()->user()->id,
                'shop_id' => $s_id->shop_id,
                'book_id' =>  $book->id,
            ]);
            
            $book_cat = Category::where('category_title',$request->categories)->get();
            foreach($book_cat as $data){
                AssignBookCategory::create([
                    'book_id' => $book->id,
                    'category_id' => $data->id,
                ]);
                ShopBookCategory::create([
                    'shop_id' => $s_id->shop_id,
                    'book_id' =>  $book->id,
                    'category_id' =>  $data->id,
                ]);
            }
            return back()->with('message','Book added successfully!');
        }
    }

    public function destroy(Request $request)
    {
        $book = Book::findOrfail($request->id);
        $book->delete();
        return back()->with('message','Book has been deleted!');
    }
}
