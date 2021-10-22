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
                        <a href="{{route('my.purchase.canceled')}}" class="btn btn-warning btn-block"><b>Canceled Order</b></a>
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
                            @foreach($user_order->where('status','pending') as $data)
                            <tr>
                                <td>
                                    <a type="button" class="btn btn-danger" id="{{$data->id}}" data-toggle="modal" data-target="#cancelBok">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </td>
                                <td><a href="#"><img height="75" src="/storage/book_image/{{$data->image}}"></a></td>
                                <td><a href="#">{{$data->book_title}}</a></td>
                                <td><span class="amount">{{$data->unit_price}}</span></td>
                                <td><span class="amount">{{$data->quantity}}</span></td>
                                <td><span class="amount">{{$data->total_price}}</span></td>
                                <td><span class="amount bg-danger text-white rounded">pending</span></td>
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

<!-- Modal cancel-->
<div class="modal fade" id="cancelBok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Books Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('cancel.purchase')}}" id="cancel_frm" method="post">
        @method('PUT')
        @csrf
        <div class="modal-body">
            Are you sure want to cancel your book order?
            <input type="text" name="trans_id" hidden>
            <label for="">Reason/Why?</label>
            <select class="custom-select" name="reason" id="inputGroupSelect01" required>
                <option >Need to modify book quantity</option>
                <option >Need to change other book</option>
            </select>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
