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
                    @if($shop == null)
                        <li class="list-group-item">
                            <a href="" class="btn btn-warning btn-block disabled"><b>My Books</b></a>
                        </li>
                        <li class="list-group-item">
                            <a href="" class="btn btn-warning btn-block disabled"><b>My Customer</b></a>
                        </li>
                        <li class="list-group-item">
                            <a href="" class="btn btn-warning btn-block disabled"><b>Transaction History</b></a>
                        </li>
                    @else
                        <li class="list-group-item">
                            <a href="{{route('sell.book')}}" class="btn btn-warning btn-block"><b>My Books</b></a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('view.customer.list')}}" class="btn btn-warning btn-block"><b>My Customer</b></a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('display.processing')}}" class="btn btn-warning btn-block"><b>Transaction History</b></a>
                        </li>
                    @endif

                    
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-warning"><h5>Shop Information</h5></div>
                <div class="card-body box-profile">
                <form action="{{route('shop.info')}}" method="POST">
                    @csrf
                    @if($shop == null)
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible">
                                Note: Shop information cannot be edit. Please double check shop information before you start your business. Thank you!
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($shop == null)
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name" class="p-1">Shop Name :</label>
                                <input id="name" name="name" value="{{($shop == null)? "": $shop_info->name}}" type="text" class="@error('name') is-invalid @enderror form-control" 
                                        placeholder="Enter Shop Name" required>
                            </div>
                            <div class="form-group">
                                <label for="address" class="p-1">Shop Address :</label>
                                <input id="address"  value="{{($shop == null)? "": $shop_info->address}}" name="address" type="text" class="@error('address') is-invalid @enderror form-control" 
                                        placeholder="Enter Shop Address" required>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name" class="p-1">Shop Name :</label>
                                <input id="name" name="name" value="{{$shop_info->name}}" type="text" class="@error('name') is-invalid @enderror form-control" 
                                        placeholder="Enter Shop Name" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="address" class="p-1">Shop Address :</label>
                                <input id="address"  value="{{$shop_info->address}}" name="address" type="text" class="@error('address') is-invalid @enderror form-control" 
                                        placeholder="Enter Shop Address" required readonly>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @if($shop == null)
                    <button class="btn btn-warning mt-2 float-right btn-sm" type="submit"><b>Get Started</b></button>
                    @endif
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection