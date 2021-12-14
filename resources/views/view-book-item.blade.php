
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
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        @foreach($shop_book as $data)
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                <img height="500" src="/storage/book_image/{{$data->image}}" alt="product image">
                            </a>
                        </div>
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content">
                    <div class="product-info">
                        <h2>{{$data->name}}</h2>
                        <span class="product-details-ref">Shop: {{$data->shop_name}}</span>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">P {{$data->unit_price}}</span>
                        </div>
                        <div class="product-desc">
                            <?php echo nl2br(html_entity_decode($data->description)) ?>
                        </div>
                        <div><span class="bg-warning rounded p-1">{{$data->quantity}}pcs - Available</span>
                        </div>
                        <div class="single-add-to-cart">
                            <form action="{{route('billing',$data->id)}}" method="POST" class="cart-quantity">
                                @csrf
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus mb-2">
                                        <input name="quantity" class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <a type="button" class="add-to-cart col-sm-12 col-lg-4 m-1 text-center" href="{{route('add.cart',$data->id)}}">Add to cart</a>
                                <button type="submit" class="add-to-cart col-sm-12 col-lg-4 m-1 text-center">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        @endforeach
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
                    <?php echo nl2br(html_entity_decode($data->details)) ?>
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
                    @foreach($book as $same_data)
                        <div class="col-lg-12">
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{route('view.book.item',$same_data->id)}}">
                                        <img height="250" src="/storage/book_image/{{$same_data->image}}">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        @foreach($same_data->shop_book as $sub_data)
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="{{route('filter.shop.name',$sub_data->shop_name)}}">{{$sub_data->shop_name}}</a>
                                            </h5>
                                        </div>
                                        @endforeach
                                        <h4><a class="product_name" href="{{route('view.book.item',$sub_data->id)}}">{{$same_data->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">₱ {{$same_data->unit_price}}</span>
                                        </div>
                                    </div>
                                    <input type="text" name="id" value="{{$same_data->id}}" hidden>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart"><a href="{{route('add.cart',$sub_data->id)}}">Add to cart</a></li>
                                            <li><a href="{{route('view.book.item',$sub_data->id)}}" title="quick view" class="quick-view-btn"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection