
@extends('layouts.buyer')

@section('content')
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                <img height="500" src="{{asset('vendor/images/product/large-size/1.jpg')}}" alt="product image">
                            </a>
                        </div>
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content">
                    <div class="product-info">
                        <h2>Kill me or I kill you</h2>
                        <span class="product-details-ref">Shop: Boi's Shop</span>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">P 90.98</span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                </span>
                            </p>
                        </div>
                        <div><span class="bg-warning rounded p-1">2pcs - Available</span>
                        </div>
                        <div class="single-add-to-cart">
                            <form action="#" class="cart-quantity">
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <a  type="submit" class="add-to-cart" href="{{route('add.cart')}}">Add to cart</a>
                                <a  type="submit" class="add-to-cart" href="{{route('billing')}}">Buy Now</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span>Book Details</span></a></li>
                    </ul>               
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    <p><span>#Book Pages: 120 pages</span></p>
                    <p><span>#Book Height-Width: 12x4</span></p>
                    <p><span>#Book Weight: 0.3kg</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Other products in the same category:</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        <div class="col-lg-12">
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="#">
                                        <img height="250" src="{{asset('vendor/images/product/large-size/1.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="#">Chad's Shop</a>
                                            </h5>
                                        </div>
                                        <h4><a class="product_name" href="#">Kill me or I kill you</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">₱ 86.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection