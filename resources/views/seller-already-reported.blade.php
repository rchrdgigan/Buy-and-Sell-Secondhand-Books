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
                                    <h2 class="text-danger">Not Allowed!</h2>
                                    <p>You're trying to report again.<br> Please wait the admin validation. Thank you!</p>
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
 