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
                                <td><img height="75" src="/storage/book_image/{{$data->image}}"></td>
                                <td><span>{{$data->book_title}}</a></td>
                                <td><span class="amount">{{$data->unit_price}}</span></td>
                                <td><span class="amount">{{$data->quantity}}</span></td>
                                <td><span class="amount">{{$data->total_price}}</span></td>
                                @if($data->status == 'completed')
                                <td><span class="amount bg-success text-white rounded">Completed</span></td>
                                @elseif($data->status == 'processing')
                                <td><span class="amount bg-info text-white rounded">Processing</span></td>
                                @endif
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