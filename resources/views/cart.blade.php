
@extends('layouts.buyer')

@section('content')
<div class="row">
    <div class="col-10 text-center mx-auto">
    @if(session('message'))
        <div class="alert alert-success alert-dismissible">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    </div>
</div>
<!--Wishlist Area Strat-->
<div class="wishlist-area pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-price">Quantity</th>
                                    <th class="li-product-stock-status">Total Amount</th>
                                    <th class="li-product-add-cart">Check Out</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $data)
                                <tr>
                                        <td class="li-product-remove"><a id="{{$data->id}}" data-toggle="modal" data-target="#delCart"><i class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail"><a href="#"><img height="75" src="/storage/book_image/{{$data->image}}"></a></td>
                                        <td class="li-product-name"><a href="#">{{$data->name}}</a></td>
                                        <td class="li-product-price"><span class="amount">{{$data->unit_price}}</span></td>
                                        <td class="li-product-price">
                                            <div class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" name="quantity" id="quantity" value="{{$data->quantity}}" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="li-product-price"><span class="amount">{{$data->total_amount}}</span></td>
                                        <td class="li-product-add-cart"><a data-toggle="modal" data-target="#buyBook" id="{{$data->id}}" shop_book_id="{{$data->shop_book_id}}" unit_price="{{$data->unit_price}}" class="btn btn-warning btn-md text-center"><b>Buy</b></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Wishlist Area End-->


<!-- Modal Delete-->
<div class="modal fade" id="delCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Books Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('del.cart')}}" id="delete_frm" method="post">
        @method('DELETE')
        @csrf
        <div class="modal-body">
            Are you sure want remove this book in your cart?
            <input type="text" id="cartId" name="id" hidden>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Buy-->
<div class="modal fade" id="buyBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="z-index:9999999;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="exampleModalLabel">Check Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('cart.buy')}}" id="buy_frm" method="post">
        @csrf
        <div class="modal-body">
            Are you sure want checkout this book?
            <input type="text" name="id" hidden>
            <input type="text" name="shop_book_id" hidden>
            <input type="text" name="unit_price" hidden>
            <input type="text" name="quantity" hidden>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-warning">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection