
@extends('layouts.buyer')

@section('content')
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
                                    <td class="li-product-thumbnail"><a href="#"><img height="75" src="/public/book_image/{{$data->image}}"></a></td>
                                    <td class="li-product-name"><a href="#">{{$data->name}}</a></td>
                                    <td class="li-product-price"><span class="amount" >{{$data->unit_price}}</span></td>
                                    <td class="li-product-price">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box"name="quantity" value="{{$data->quantity}}" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="li-product-price"><span class="amount" id="total_amount">50</span></td>
                                    <td class="li-product-add-cart"><a href="{{route('billing')}}">Buy</a></td>
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
            <input type="text" id="cartId" name="id">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection