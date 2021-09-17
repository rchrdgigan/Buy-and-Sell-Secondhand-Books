@extends('layouts.app')

@section('content')
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
                        <a href="#" class="btn btn-warning btn-block"><b>Canceled Order</b></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="btn btn-warning btn-block"><b>Refunded Order</b></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                <h2>Pending Order</h2>
                    <table class="table table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Cancel</th>
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
                            <tr>
                                <td>
                                    <a type="button" class="btn btn-danger">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </td>
                                <td><a href="#"><img height="75" src="{{asset('vendor/images/product/large-size/2.jpg')}}"></a></td>
                                <td><a href="#">Kill me</a></td>
                                <td><span class="amount">100.00</span></td>
                                <td><span class="amount">2</span></td>
                                <td><span class="amount">200.00</span></td>
                                <td><span class="amount bg-danger text-white p-1 rounded">pending</span></td>
                                <td>
                                    <a type="button" class="btn btn-primary">
                                        View
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a type="button" class="btn btn-danger">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </td>
                                <td><a href="#"><img height="75" src="{{asset('vendor/images/product/large-size/1.jpg')}}"></a></td>
                                <td><a href="#">The day you said good night</a></td>
                                <td><span class="amount">130.00</span></td>
                                <td><span class="amount">2</span></td>
                                <td><span class="amount">260.00</span></td>
                                <td><span class="amount bg-danger text-white p-1 rounded">pending</span></td>
                                <td>
                                    <a type="button" class="btn btn-primary">
                                        View
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
