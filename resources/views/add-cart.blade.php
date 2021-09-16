
@extends('layouts.buyer')

@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Wishlist Area Strat-->
<div class="wishlist-area pt-60 pb-60">
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
                                <tr>
                                    <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img height="75" src="{{asset('vendor/images/product/large-size/2.jpg')}}"></a></td>
                                    <td class="li-product-name"><a href="#">Kill me</a></td>
                                    <td class="li-product-price"><span class="amount">100.00</span></td>
                                    <td class="li-product-price">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="li-product-price"><span class="amount">200.00</span></td>
                                    <td class="li-product-add-cart"><a href="#">Buy</a></td>
                                </tr>
                                <tr>
                                    <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img height="75" src="{{asset('vendor/images/product/large-size/1.jpg')}}"></a></td>
                                    <td class="li-product-name"><a href="#">The day you said good night</a></td>
                                    <td class="li-product-price"><span class="amount">130.00</span></td>
                                    <td class="li-product-price">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="li-product-price"><span class="amount">260.00</span></td>
                                    <td class="li-product-add-cart"><a href="#">Buy</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Wishlist Area End-->
@endsection