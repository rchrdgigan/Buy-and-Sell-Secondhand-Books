@extends('layouts.buyer')

@section('content')
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper pt-50 pb-60">
  
            <!-- Error 404 Area Start -->
            <div class="error404-area pt-30 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="error-wrapper text-center ptb-50 pt-xs-20">
                                <div class="error-text">
                                    <h2 class="text-danger">Not found!</h2>
                                    <p>Please input an specific shop name... Thank you!</p>
                                </div>
                                <div class="search-error">
                                    <form id="search-form" action="#">
                                        <input type="text" placeholder="Search">
                                        <button><i class="zmdi zmdi-search"></i></button>
                                    </form>
                                </div>
                                <div class="error-button">
                                    <a href="{{route('filter.categories')}}">See other book</a>
                                    <a href="{{ url('/') }}">Back to home page</a>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
 