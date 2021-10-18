@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
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
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                        <a href="{{route('my.shop')}}" class="btn btn-warning btn-block"><b>Shop Setting</b></a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('sell.book')}}" class="btn btn-warning btn-block"><b>My Books</b></a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('view.customer.list')}}" class="btn btn-warning btn-block"><b>My Customer</b></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="btn btn-warning btn-block"><b>Transaction History</b></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5>Customer's List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="picture-container mb-2">
                                        <div class="picture">
                                            <img src="/storage/users_image/{{auth()->user()->image}}" class="rounded-circle text-center" width="100px;" height="100px;">
                                        </div>
                                    </div>
                                    <h4 class="profile-username text-center mb-3 p-2">Customer Name</h4>
                                    <hr>
                                    <div class="form-group">
                                        <b>Book Title :</b><span> Book Name</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <b>Price x Qty :</b><span> 500 x 2</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <b>Total :</b><span> 1000</span>
                                    </div>
                                    <hr>
                                    <button class="btn btn-warning float-right" type="submit"><b>More Info</b></button>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection