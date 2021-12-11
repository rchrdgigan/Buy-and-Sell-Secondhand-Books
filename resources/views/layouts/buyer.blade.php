<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home || Bulan Buy and Sell for eCommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('vendor/images/favicon.png')}}">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="{{asset('vendor/css/material-design-iconic-font.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('vendor/css/font-awesome.min.css')}}">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="{{asset('vendor/css/fontawesome-stars.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/meanmenu.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/owl.carousel.min.css')}}">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/slick.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/animate.css')}}">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/jquery-ui.min.css')}}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/venobox.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/nice-select.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/magnific-popup.css')}}">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/bootstrap.min.css')}}">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/helper.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('vendor/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('vendor/css/responsive.css')}}">
    <!-- Modernizr js -->
    <script src="{{asset('vendor/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('vendor/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('vendor/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/codemirror/theme/monokai.css') }}">
</head>
<body>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                <a href="{{ url('/') }}">
                    <img class="rounded-circle" src="{{asset('vendor/images/logo.PNG')}}" height="30">
                    {{ config('app.name', 'Laravel') }}
                </a>
                </div>
                
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
                            <li>
                                <div class="ht-setting-trigger"><span>Setting</span></div>
                                <div class="setting ht-setting">
                                    <ul class="ht-setting-list">
                                        @if (Route::has('login'))
                                                @auth
                                                <li><a href="{{route('home')}}">My Account</a></li>
                                                <li><a href="#">My Purchase</a></li>
                                                @else
                                                <li><a href="{{ route('login') }}">Log in</a></li>
                                                    @if (Route::has('register'))
                                                    <li><a href="{{ route('register') }}">Register</a></li>
                                                    @endif
                                                @endauth
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            <!-- Setting Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
    <header>
        <!-- Begin Header Middle Area -->
        <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
            <div class="container">
                <div class="row">
                    <!-- Begin Header Logo Area -->
                    <div class="col-lg-3">
                        <div class="logo pb-sm-30 pb-xs-30">
                            <a href="#">
                                <h3>Bulan Book Buy and Sell</h3>
                                <!-- <img src="images/menu/logo/1.jpg" alt=""> -->
                            </a>
                        </div>
                    </div>
                    <!-- Header Logo Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                        <!-- Begin Header Middle Searchbox Area -->
                        <form action="{{route('search.shop.cat')}}" method="post" class="hm-searchbox">
                            @csrf
                            <select class="nice-select select-search-category" name="select_for">
                                <option value="Shop">Shop</option>                         
                                @foreach($category as $data)
                                    <option value="{{$data->category_title}}">{{$data->category_title}}</option>
                                @endforeach                                 
                            </select>
                            <input type="text" name="srch_for" placeholder="Enter your search shop name or book title...">
                            <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <!-- Header Middle Searchbox Area End Here -->
                        <!-- Begin Header Middle Right Area -->
                        <div class="header-middle-right">
                        
                            <ul class="hm-menu">
                                <!-- Begin Header Mini Cart Area -->
                                <li class="hm-minicart">
                                   <a href="{{route('cart')}}" style="margin-right:70px; line-height:5px;"><span class="item-icon text-danger col-12"></span> 
                                    <i class="bg-danger text-white rounded">CART</i>
                                    </a> 
                                </li>
                                <!-- Header Mini Cart Area End Here -->
                            </ul>
                        </div>
                        <!-- Header Middle Right Area End Here -->
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
            </div>
        </div>
        <!-- Header Middle Area End Here -->
        <!-- Begin Header Bottom Area -->
        <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Begin Header Bottom Menu Area -->
                        <div class="hb-menu">
                            <nav>
                                <ul>
                                    <li class="dropdown-holder"><a href="{{ url('/') }}">Home</a>
                                        <ul class="hb-dropdown">
                                            <li><a href="{{ url('/') }}">Main Site</a></li>
                                            @if (Route::has('login'))
                                                    @auth
                                                    <li><a href="{{route('home')}}">My Account</a></li>
                                                    <li><a href="{{route('my.purchase')}}">My Purchase</a></li>
                                                    <li><a href="{{route('my.shop')}}">My Shop</a></li>
                                                    @endauth
                                            @endif
                                        </ul>
                                    </li>
                                    <li class="megamenu-holder"><a href="{{route('filter.categories')}}">Categories</a>
                                        <ul class="megamenu hb-megamenu">
                                            <li><a href="{{route('filter.categories')}}">Book Category</a>
                                            @foreach($category as $d2)
                                                <ul>
                                                    @forelse($d2->assign_book_category->take(1) as $c1)
                                                    <li><a href="{{route('filter.categories.name',$d2->category_title)}}">{{$d2->category_title}} ({{$c1->where('category_id',$d2->id)->count()}})</a></li>
                                                    @empty
                                                    
                                                    @endforelse
                                                </ul>
                                            @endforeach
                                            </li>

                                            <li><a href="{{route('filter.categories')}}">Shop Category</a>
                                            @foreach($shop->take(5) as $d3)
                                                <ul>
                                                    @forelse($d3->shop_book->take(1) as $c2)
                                                    <li><a href="{{route('filter.shop.name',$d3->name)}}">{{$d3->name}} ({{$c2->where('shop_id',$d3->id)->count()}})</a></li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endforeach

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="megamenu-holder"><a href="#">About Us</a>
                                        <ul class="megamenu hb-megamenu">
                                            <li><a href="#">Book - Shopping in Bulan</a>
                                                <ul>
                                                    <li><a href="#">Bulan Area Only</a></li>
                                                    <li><a href="#">No Valid ID - No to Shopping</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Bottom Menu Area End Here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom Area End Here -->
        <!-- Begin Mobile Menu Area -->
        <div class="mobile-menu-area d-lg-none d-xl-none col-12">
            <div class="container"> 
                <div class="row">
                    <div class="mobile-menu">
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu Area End Here -->
    </header>
    <!-- Header Area End Here -->
    
    @yield('content')

    <!-- Begin Footer Area -->
    <div class="footer">
        <!-- Begin Footer Static Middle Area -->
        <div class="footer-static-middle">
            <div class="container">
                <div class="footer-logo-wrap pt-50 pb-35">
                    <div class="row">
                        <!-- Begin Footer Logo Area -->
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-logo">
                                <h3>Bulan Book Buy and Sell</h3>
                            </div>
                            <ul class="des">
                                <li>
                                    <span>Address: </span>
                                    Bulan Sorsogon
                                </li>
                                <li>
                                    <span>Phone: </span>
                                    <a href="#">(+63)9214511231</a>
                                </li>
                                <li>
                                    <span>Email: </span>
                                    <a href="#">info@yourdomain.com</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Footer Logo Area End Here -->
                        <!-- Begin Footer Block Area -->
                        <div class="col-lg-2 col-md-3 col-sm-6">
                            <div class="footer-block">
                                <h3 class="footer-block-title">Product</h3>
                                <ul>
                                    <li><a href="#">Prices drop</a></li>
                                    <li><a href="#">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Block Area End Here -->
                        <!-- Begin Footer Block Area -->
                        <div class="col-lg-4">
                            <div class="footer-block">
                                <h3 class="footer-block-title">Follow Us</h3>
                                <ul class="social-link">
                                    <li class="twitter">
                                        <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://www.instagram.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Block Area End Here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Static Middle Area End Here -->
    </div>
    <!-- Footer Area End Here -->
</div>
        <!-- jQuery-V1.12.4 -->
        <script src="{{asset('vendor/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('vendor/js/vendor/popper.min.js')}}"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{asset('vendor/js/bootstrap.min.js')}}"></script>
        <!-- Ajax Mail js -->
        <script src="{{asset('vendor/js/ajax-mail.js')}}"></script>
        <!-- Meanmenu js -->
        <script src="{{asset('vendor/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Wow.min js -->
        <script src="{{asset('vendor/js/wow.min.js')}}"></script>
        <!-- Slick Carousel js -->
        <script src="{{asset('vendor/js/slick.min.js')}}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{asset('vendor/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific popup js -->
        <script src="{{asset('vendor/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{asset('vendor/js/isotope.pkgd.min.js')}}"></script>
        <!-- Imagesloaded js -->
        <script src="{{asset('vendor/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- Mixitup js -->
        <script src="{{asset('vendor/js/jquery.mixitup.min.js')}}"></script>
        <!-- Countdown -->
        <script src="{{asset('vendor/js/jquery.countdown.min.js')}}"></script>
        <!-- Counterup -->
        <script src="{{asset('vendor/js/jquery.counterup.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('vendor/js/waypoints.min.js')}}"></script>
        <!-- Barrating -->
        <script src="{{asset('vendor/js/jquery.barrating.min.js')}}"></script>
        <!-- Jquery-ui -->
        <script src="{{asset('vendor/js/jquery-ui.min.js')}}"></script>
        <!-- Venobox -->
        <script src="{{asset('vendor/js/venobox.min.js')}}"></script>
        <!-- Nice Select js -->
        <script src="{{asset('vendor/js/jquery.nice-select.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{asset('vendor/js/scrollUp.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{asset('vendor/js/main.js')}}"></script>

        <!-- Summernote -->
        <script src="{{ asset('vendor/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- CodeMirror -->
        <script src="{{ asset('vendor/plugins/codemirror/codemirror.js') }}"></script>
        <script src="{{ asset('vendor/plugins/codemirror/mode/css/css.js') }}"></script>
        <script src="{{ asset('vendor/plugins/codemirror/mode/xml/xml.js') }}"></script>
        <script src="{{ asset('vendor/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>

        <script>
            $(function () {
                //Initialize Summernote
                $('#summernote').summernote({placeholder: 'Example Note', tabsize: 2, height: 100,});
            });
        </script>

        <script>
             $(document).on("click", ".open-AddBookDialog", function () {
                var myCartId = $(this).data('id');
                $(".modal-body #cartId").val( myCartId );
              });
        </script>

        <script>
        $('#delCart').on('show.bs.modal', function (e) {
            var opener=e.relatedTarget;
            var id=$(opener).attr('id');
            $('#delete_frm').find('[name="id"]').val(id);
        });
        </script>

         <script>
            $('#buyBook').on('show.bs.modal', function (e) {
                var opener=e.relatedTarget;
                var id=$(opener).attr('id');
                var shop_book_id=$(opener).attr('shop_book_id');
                var quantity=document.getElementById('quantity').value;
                var unit_price=$(opener).attr('unit_price');
                $('#buy_frm').find('[name="id"]').val(id);
                $('#buy_frm').find('[name="shop_book_id"]').val(shop_book_id);
                $('#buy_frm').find('[name="quantity"]').val(quantity);
                $('#buy_frm').find('[name="unit_price"]').val(unit_price);
            });
        </script>

        <script>
        $('#delCart').on('show.bs.modal', function (e) {
            var opener=e.relatedTarget;
            var id=$(opener).attr('id');
            $('#delete_frm').find('[name="id"]').val(id);
        });
        </script>
       
</body>
</html>