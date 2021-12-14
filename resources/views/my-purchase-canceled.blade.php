@extends('layouts.app')

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
<div class="container">
    <div class="row">
        <div class="col-12">
        <h6 class="float-right"><a href="{{route('my.purchase')}}">My Purchase</a> / Canceled Order</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <a href="{{route('my.purchase')}}" class="btn btn-warning btn-block"><b>Pending Order</b></a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('my.purchase.process')}}" class="btn btn-warning btn-block"><b>In-process Order</b></a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('my.purchase.completed')}}" class="btn btn-warning btn-block"><b>Completed Order</b></a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('my.purchase.canceled')}}" class="btn btn-warning btn-block"><b>Canceled Order</b></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                <h2>Canceled Order</h2>
                    <table class="table table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>View Order</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user_order->where('status','canceled') as $data)
                            <tr>
                                <td><a href="#"><img height="75" src="/public/book_image/{{$data->image}}"></a></td>
                                <td><a href="#">{{$data->book_title}}</a></td>
                                <td><span class="amount">{{$data->unit_price}}</span></td>
                                <td><span class="amount">{{$data->quantity}}</span></td>
                                <td><span class="amount">{{$data->total_price}}</span></td>
                                <td><span class="amount bg-secondary text-white rounded">canceled</span></td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm"
                                        id="{{str_pad($data->id, 6, '0', STR_PAD_LEFT)}}"
                                        book="{{$data->book_title}}"
                                        price="{{$data->unit_price}}"
                                        qty="{{$data->quantity}}"
                                        total="{{$data->total_price}}"
                                        status="{{$data->status}}"
                                        image="/public/book_image/{{$data->image}}"
                                        shop="{{$data->shop_name}}"
                                        reason="{{$data->reason}}"
                                        contact="{{$data->contact}}"
                                        address="{{$data->address}}"
                                        data-toggle="modal" 
                                        data-target="#cancelPurchase">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal More Info-->
<div class="modal fade" id="cancelPurchase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Purchase Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                <div class="picture-container mb-2">
                    <img id="image" class="rounded text-center" width="100px;" height="100px;">
                   
                    <div class="form-group pt-4">
                        <b>Shop Name :</b><br>
                        <span id="shop"></span>
                    </div>
                    <div class="form-group h6">
                        <b>Address :</b><br>
                        <span id="address"></span>
                    </div>
                    <div class="form-group h6">
                        <b>Contact Number :</b><br>
                        <span id="contact"></span>
                    </div>
                </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <b>Transaction Number :</b><br>
                        <span id="trans_id"></span>
                    </div>
                    <div class="form-group h6">
                        <b>Book Title : </b> <span id="book_title"></span>
                    </div> 
                    <div class="form-group h6">
                        <b>Price x Qty : </b> <span id="unit_price"></span> x <span id="quantity"></span>
                    </div> 
                    <div class="form-group h6">
                        <b>Total :</b> <span id="total_price"></span>
                    </div>   
                    <div class="form-group h6">
                        <b>Status : </b> <span class="text-secondary" id="status"></span>
                    </div>  
                    <div class="form-group h6">
                        <b>Reason :</b> <span id="reason"></span>
                    </div>  
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
@endsection
