    
@extends('layouts.buyer')

@section('content')
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- shop-top-bar start -->
                <div class="shop-top-bar">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <!-- shop-item-filter-list start -->
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                        </div>
                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <div class="product-short">
                            <p>Sort By:</p>
                            <select class="nice-select">
                                <option value="sales">Name (A - Z)</option>
                                <option value="sales">Name (Z - A)</option>
                            </select>
                        </div>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="#">
                                                    <img height="300" src="{{asset('vendor/images/product/large-size/1.jpg')}}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="#">Boi's Shop</a>
                                                        </h5>
                                                    </div>
                                                    <h4><a class="product_name" href="{{route('view.book.item')}}">Kill me or I kill you</a></h4>
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
                                        <!-- single-product-wrap end -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="paginatoin-area mb-2">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p>Showing 1-12 of 13 item(s)</p>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul class="pagination-box">
                                        <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                            <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="sidebar-categores-box text-center">
                <ul>
                    <li><a href=""><img height="100" width="100" src="{{asset('vendor/images/product/large-size/1.jpg')}}" class="rounded-circle mb-2" alt="" /></a></li>
                    <h3>Boi's Shop</h3>
                    <li><a href="">Name: Oscar Jay Mino</a></li>
                    <li><a href="">Email: oscarj_mino@email.com</a></li>
                </ul>
                </div>  
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box">
                    <div class="sidebar-title">
                        <h2>My Books</h2>
                    </div>
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area">
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Categories</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><a href="#">Romace (6)</a></li>
                                    <li><a href="#">Horror (10)</a></li>
                                    <li><a href="#">Love Story (6)</a></li>
                                    <li><a href="#">Crime (10)</a></li>
                                    <li><a href="#">Drama (6)</a></li>
                                    <li><a href="#">Comic book (10)</a></li>
                                    <li><a href="#">Fairytale (6)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wraper Area End Here -->

@endsection