    
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
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                @foreach($book as $data)
                                    <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{route('view.book.item',$data->id)}}">
                                                    <img height="300" src="/storage/book_image/{{$data->image}}" alt="Li's Product Image">
                                                </a>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{route('filter.shop.name',$data->shop_name)}}">{{$data->shop_name}}</a>
                                                        </h5>
                                                    </div>
                                                    <h4><a class="product_name" href="{{route('view.book.item',$data->id)}}">{{$data->name}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">₱ {{$data->unit_price}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="">Add to cart</a></li>
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
                        <!--  -->
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                
                <div class="sidebar-categores-box text-center">
                @foreach($shop_name->take(1) as $udata)
                @forelse($udata->user_shop->take(1) as $u1)
                @foreach($users->where('id',$u1->user_id)->take(1) as $user)
                    <div class="row ml-2">
                        <div class="input-group-prepend float-left">
                        <button type="button" class="btn dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item btn-sm" href="#"> Report Shop</a>
                        </div>
                        </div>
                    </div>
                    <ul>
                        <li><a href=""><img height="150" width="150" src="/storage/users_image/{{$user->image}}" class="rounded-circle mb-2" alt="" /></a></li>
                        <h3>{{$udata->name}}</h3>
                        <li><a href="">Name: {{$user->first_name}}  {{$user->middle_name}} {{$user->last_name}}</a></li>
                        <li><a href="">Email: {{$user->email}}</a></li>
                    </ul>
                    @endforeach
                    @empty
                @endforelse
                @endforeach
                </div>  
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box">
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area">
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">My Categories</h5>
                        <div class="categori-checkbox">
                            @foreach($shop_name->take(1) as $udata)
                                @foreach($shop_book_cat as $rp)
                                <ul>
                                    @forelse($rp->shop_book_category->where('shop_id',$udata->id)->take(1) as $xb)
                                    <li><a href="{{route('filter.shop.book',[$udata->name,$rp->category_title,$xb->shop_id])}}">{{$rp->category_title}} ({{$xb->where('category_id',$rp->id)->where('shop_id',$udata->id)->count()}})</a></li>
                                    @empty
                                    
                                    @endforelse
                                </ul>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                    <h5 class="filter-sub-titel">Other Categories</h5>
                        <div class="categori-checkbox">
                            @foreach($category as $d2)
                            <ul>
                                @forelse($d2->assign_book_category->take(1) as $c1)
                                <li><a href="{{route('filter.categories.name',$d2->category_title)}}">{{$d2->category_title}} ({{$c1->where('category_id',$d2->id)->count()}})</a></li>
                                @empty
                                
                                @endforelse
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                    <h5 class="filter-sub-titel">Other Shops</h5>
                        <div class="categori-checkbox">
                            @foreach($shop as $d3)
                            <ul>
                                @forelse($d3->shop_book->take(1) as $c2)
                                <li><a href="{{route('filter.shop.name',$d3->name)}}">{{$d3->name}} ({{$c2->where('shop_id',$d3->id)->count()}})</a></li>
                                @empty
                                
                                @endforelse
                            </ul>
                            @endforeach
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