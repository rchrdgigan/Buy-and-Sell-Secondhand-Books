@extends('layouts.buyer')

@section('content')
 <!--Checkout Area Strat-->
 <div class="checkout-area pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
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
                                    <td class="cart-product-name"> Kill me or I kill you<strong class="product-quantity"> × 2</strong></td>
                                    <td class="cart-product-total"><span class="amount">100.00</span></td>  
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">200.00</span></strong></td>
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
                                <div class="card">
                                <div class="card-header" id="#payment-2">
                                    <h5 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                       Our G-Cash or Bank Account
                                    </a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                    <p>G-Cash Account # : 0931312121 <b> - Name : Oscar Jay Mino</b></p>
                                    <p>-OR-</p>
                                    <p>Bank Account # : <b>3123123451231</b></p>

                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="order-button-payment">
                                <input value="Place order" type="submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout Area End-->

@endsection