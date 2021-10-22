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
                                <td><a href="#"><img height="75" src="/storage/book_image/{{$data->image}}"></a></td>
                                <td><a href="#">{{$data->book_title}}</a></td>
                                <td><span class="amount">{{$data->unit_price}}</span></td>
                                <td><span class="amount">{{$data->quantity}}</span></td>
                                <td><span class="amount">{{$data->total_price}}</span></td>
                                <td><span class="amount bg-secondary text-white rounded">canceled</span></td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm">
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
@endsection
