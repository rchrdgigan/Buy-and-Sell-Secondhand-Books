@extends('layouts.buyer')

@section('content')
    <!-- Begin Slider With Banner Area -->
    <div class="slider-with-banner">
        <div class="container">
            <div class="row">
                <!-- Begin Slider Area -->
                <div class="col-lg-12 col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" height="550" src="{{asset('vendor/images/slider/1.jpg')}}" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" height="550" src="{{asset('vendor/images/slider/2.jpg')}}" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" height="550" src="{{asset('vendor/images/slider/3.jpg')}}" alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!-- Slider Area End Here -->
        </div>
    </div>
    <!-- Slider With Banner Area End Here -->
    <!-- Begin Product Area -->
    <div class="product-area pt-60 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                           <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New for Sale</span></a></li>
                           <li><a data-toggle="tab" href="#li-bestseller-product"><span>Best Books</span></a></li>
                        </ul>               
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach($shop_book as $data)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{route('view.book.item',$data->id)}}">
                                            <img height="250" src="/storage/book_image/{{$data->image}}" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="{{route('seller.shop')}}">{{$data->shop_name}}</a>
                                                </h5>
                                            </div>
                                            <h4><a class="product_name" href="{{route('view.book.item',$data->id)}}">{{$data->name}}</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">₱ {{$data->unit_price}}</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart"><a href="{{route('add.cart',$data->id)}}">Add to cart</a></li>
                                                <li><a href="{{route('view.book.item',$data->id)}}" title="quick view" class="quick-view-btn"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="#">
                                            <img height="250" src="{{asset('vendor/images/product/large-size/2.jpg')}}" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="{{route('seller.shop')}}">Boi's Shop</a>
                                                </h5>
                                            </div>
                                            <h4><a class="product_name" href="#">The day you said Goodnight</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">₱ 100.80</span>
                                                <span class="old-price">₱ 400.22</span>
                                                <span class="discount-percentage">-7%</span>
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
                                <!-- single-product-wrap end -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->
    
@endsection