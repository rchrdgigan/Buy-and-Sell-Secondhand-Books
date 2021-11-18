<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/myscript.js') }}"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- My Styles -->
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="text-center">
                        <img class="rounded-circle" src="{{asset('vendor/images/logo.png')}}" height="30">
                        {{ config('app.name', 'Laravel') }}
                    </div>
                   
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('/')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                Home
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('home')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('my.purchase')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    My Purchase
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('my.shop')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    My Shop
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
   $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
    });

    $('#cancelBok').on('show.bs.modal', function (e) {
        var opener=e.relatedTarget;
        var id=$(opener).attr('id');
        $('#cancel_frm').find('[name="trans_id"]').val(id);
    });

    $('#viewBook').on('show.bs.modal', function (e) {
        var opener=e.relatedTarget;
        var id=$(opener).attr('id');
        var book_id=$(opener).attr('book_id');
        var book_title=$(opener).attr('book_title');
        var unit_price=$(opener).attr('price');
        var quantity=$(opener).attr('quantity');
        var total=$(opener).attr('total');
        var status=$(opener).attr('status');
        var available=$(opener).attr('available');
        var details=$(opener).attr('details');
        var description=$(opener).attr('description');
        var imgsrc=$(opener).attr('image');
        

        $('#approved_frm').find('[name="trans_id"]').val(id);
        $('#approved_frm').find('[name="book_id"]').val(book_id);
        $('#approved_frm').find('[name="quantity"]').val(quantity);
        $('#approved_frm').find('[name="total_price"]').val(total);

        document.getElementById('book_title').innerHTML = book_title;
        document.getElementById('unit_price').innerHTML = unit_price;
        document.getElementById('quantity').innerHTML = quantity;
        document.getElementById('total_price').innerHTML = total;
        document.getElementById('status').innerHTML = status;
        document.getElementById('available').innerHTML = available;
        document.getElementById('details').innerHTML = details;
        document.getElementById('description').innerHTML = description;
        $('#image').attr('src',imgsrc);

    });

    $(document).ready(function() {
        $('#summernoteDescription').summernote();
        $('#summernoteDetails').summernote();
    });

    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<script>
    function multiply() {
    var quantity = document.getElementById('quantity').value;
    var price = document.getElementById('unit_price').value;
    var result = document.getElementById('total_amount');

        if(result !=null){
        const num1 = quantity;
        const num2 = price;
        const temp = num1 * num2;
            console.log(temp);
            result.value = "" + temp;
        }
        else {
        result.value = "0";
        }
    }
</script>

<script>
    $('#viewPurchase').on('show.bs.modal', function (e) {
        var opener=e.relatedTarget;
        var id=$(opener).attr('id');
        var book_title=$(opener).attr('book');
        var unit_price=$(opener).attr('price');
        var quantity=$(opener).attr('qty');
        var total=$(opener).attr('total');
        var status=$(opener).attr('status');
        var imgsrc=$(opener).attr('image');
        var shop=$(opener).attr('shop');
        var address=$(opener).attr('address');
        var contact=$(opener).attr('contact');

        document.getElementById('trans_id').innerHTML = id;
        document.getElementById('book_title').innerHTML = book_title;
        document.getElementById('unit_price').innerHTML = unit_price;
        document.getElementById('quantity').innerHTML = quantity;
        document.getElementById('total_price').innerHTML = total;
        document.getElementById('status').innerHTML = status;
        document.getElementById('shop').innerHTML = shop;
        document.getElementById('address').innerHTML = address;
        document.getElementById('contact').innerHTML = contact;
        $('#image').attr('src',imgsrc);

    });
</script>

<script>
    $('#cancelPurchase').on('show.bs.modal', function (e) {
        var opener=e.relatedTarget;
        var id=$(opener).attr('id');
        var book_title=$(opener).attr('book');
        var unit_price=$(opener).attr('price');
        var quantity=$(opener).attr('qty');
        var total=$(opener).attr('total');
        var status=$(opener).attr('status');
        var imgsrc=$(opener).attr('image');
        var shop=$(opener).attr('shop');
        var reason=$(opener).attr('reason');
        var address=$(opener).attr('address');
        var contact=$(opener).attr('contact');

        document.getElementById('trans_id').innerHTML = id;
        document.getElementById('book_title').innerHTML = book_title;
        document.getElementById('unit_price').innerHTML = unit_price;
        document.getElementById('quantity').innerHTML = quantity;
        document.getElementById('total_price').innerHTML = total;
        document.getElementById('status').innerHTML = status;
        document.getElementById('shop').innerHTML = shop;
        document.getElementById('reason').innerHTML = reason;
        document.getElementById('address').innerHTML = address;
        document.getElementById('contact').innerHTML = contact;
        $('#image').attr('src',imgsrc);

    });
</script>

<script>
    $('#viewLog').on('show.bs.modal', function (e) {
        var opener=e.relatedTarget;
        var id=$(opener).attr('id');
        var book_title=$(opener).attr('book');
        var unit_price=$(opener).attr('price');
        var quantity=$(opener).attr('qty');
        var total=$(opener).attr('total');
        var status=$(opener).attr('status');
        var contact=$(opener).attr('contact');
        var imgsrc=$(opener).attr('image');
        var customer=$(opener).attr('customer');
        var address=$(opener).attr('address');

        document.getElementById('trans_id').innerHTML = id;
        document.getElementById('book_title').innerHTML = book_title;
        document.getElementById('unit_price').innerHTML = unit_price;
        document.getElementById('quantity').innerHTML = quantity;
        document.getElementById('total_price').innerHTML = total;
        document.getElementById('status').innerHTML = status;
        document.getElementById('contact').innerHTML = contact;
        document.getElementById('customer').innerHTML = customer;
        document.getElementById('address').innerHTML = address;
        $('#image').attr('src',imgsrc);

    });
</script>


<script>
    $('#viewBooks').on('show.bs.modal', function (e) {
        var opener=e.relatedTarget;
        var book_title=$(opener).attr('book_title');
        var book_desc=$(opener).attr('book_desc');
        var book_detail=$(opener).attr('book_detail');
        var book_cat=$(opener).attr('book_cat');
        var quantity=$(opener).attr('quantity');
        var price=$(opener).attr('price');
        var total=$(opener).attr('total');
        var imgsrc=$(opener).attr('image');

        document.getElementById('book').innerHTML = book_title;
        document.getElementById('book_desc').innerHTML = book_desc;
        document.getElementById('book_detail').innerHTML = book_detail;
        document.getElementById('book_cat').innerHTML = book_cat;
        document.getElementById('qty').innerHTML = quantity;
        document.getElementById('total').innerHTML = total;
        document.getElementById('price').innerHTML = price;
        $('#image').attr('src',imgsrc);

    });
</script>
