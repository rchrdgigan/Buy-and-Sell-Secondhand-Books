@extends('layouts.buyer')

@section('content')
 <!--Checkout Area Strat-->
 <div class="checkout-area pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                @foreach($book as $data)
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="cart-product-name"> {{$data->name}}<strong class="product-quantity"> × {{$quantity}}</strong></td>
                                    <td class="cart-product-total"><span class="amount">{{$data->unit_price}}</span></td>  
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">{{$total}}</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="#payment-1">
                                        <h5 class="panel-title">
                                        <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Direct Bank Transfer.
                                        </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('buy.book')}}" method="post">
                                @csrf
                                <input type="text" name="book_id" value="{{$data->book_id}}" hidden>
                                <input type="text" name="user_id" value="{{$data->user_id}}" hidden>
                                <input type="text" name="shop_id" value="{{$data->shop_id}}" hidden>
                                <input type="text" name="quantity" value="{{$quantity}}" hidden>
                                <input type="text" name="total_price" value="{{$total}}" hidden>
                                <div class="order-button-payment">
                                    <button type="submit" class="col-12 btn btn-warning p-3 text-white"><b>PLACE ORDER</b></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--Checkout Area End-->

@endsection