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
        <div class="col-12">
        <h6 class="float-right"><a href="{{route('my.shop')}}">My Shop</a> / Transaction History</h6>
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
                        <a href="{{route('display.processing')}}" class="btn btn-warning btn-block"><b>Transaction History</b></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                <h2>Transaction Log</h2>
                    <table class="table table-responsive table-striped">
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
                        @forelse($customer->where('status', '<>' , 'pending') as $data)
                            <tr>
                                <td><img height="75" src="/public/book_image/{{$data->image}}"></td>
                                <td><span>{{$data->book_title}}</a></td>
                                <td><span class="amount">{{$data->unit_price}}</span></td>
                                <td><span class="amount">{{$data->quantity}}</span></td>
                                <td><span class="amount">{{$data->total_price}}</span></td>
                                @if($data->status == 'completed')
                                <td><span class="amount bg-success text-white rounded">Completed</span></td>
                                @elseif($data->status == 'processing')
                                <td><span class="amount bg-info text-white rounded">Processing</span></td>
                                @elseif($data->status == 'canceled')
                                <td><span class="amount bg-secondary text-white rounded">Canceled</span></td>
                                @endif
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm"
                                    id="{{str_pad($data->id, 6, '0', STR_PAD_LEFT)}}"
                                    trans_id="{{$data->id}}"
                                    book="{{$data->book_title}}"
                                    price="{{$data->unit_price}}"
                                    qty="{{$data->quantity}}"
                                    total="{{$data->total_price}}"
                                    status="{{$data->status}}"
                                    reason="{{$data->reason}}"
                                    contact="{{$data->contact}}"
                                    image="/public/book_image/{{$data->image}}"
                                    customer="{{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}"
                                    address="{{$data->brgy}} {{$data->street}} {{$data->purok}}"
                                    data-toggle="modal" 
                                    data-target="#viewLog">
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
<div class="modal fade" id="viewLog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <b>Customer Name :</b><br>
                        <span id="customer"></span>
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
                        <b>Status : </b> <span id="status"></span>
                    </div>  
                    <div class="form-group h6">
                        <b id="val_reason" style="display:none">Reason : </b> <span id="reason"></span>
                    </div>  
                </div>
            </div>
        </div>
        <form action="{{route('transaction.finish')}}" method="post" id="complete_frm">
            @method('PUT')
            @csrf
            <input type="text" name="id" hidden>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" id="val_button" style="display:none" class="btn btn-success btn-sm">Done</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection