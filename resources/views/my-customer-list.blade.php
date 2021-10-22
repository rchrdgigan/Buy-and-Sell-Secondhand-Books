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
                <div class="card-header bg-warning">
                    <h5>Customer's List</h5>
                </div>
                <div class="card-body">
                    @forelse($customer->where('status', 'pending') as $data)
                    
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="picture-container mb-2">
                                        <div class="picture">
                                            <img src="/storage/users_image/{{$data->user_image}}" class="rounded-circle text-center" width="100px;" height="100px;">
                                        </div>
                                    </div>
                                    <h6 class="profile-username text-center mb-3 p-2">{{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}</h6>
                                    <div class="form-group h6">
                                        <b>Email : </b><span> {{$data->email}}</span>
                                    </div>
                                    <div class="form-group h6">
                                        <b>Address : </b><span> {{$data->brgy}} {{$data->street}} {{$data->purok}}</span>
                                    </div>
                                    <button class="btn btn-warning float-left btn-sm" type="submit" data-toggle="modal" data-target="#cancelBook"><b>Cancel Order</b></button>
                                    <button class="btn btn-warning float-right btn-sm" 
                                            type="submit"
                                            id="{{$data->id}}"
                                            book_title="{{$data->book_title}}"
                                            price="{{$data->unit_price}}"
                                            quantity="{{$data->quantity}}"
                                            total="{{$data->total_price}}"
                                            status="{{$data->status}}"
                                            available="{{$data->available}}"
                                            details="{{$data->details}}"
                                            description="{{$data->description}}"
                                            image="/storage/book_image/{{$data->image}}"
                                            data-toggle="modal" 
                                            data-target="#viewBook">
                                            <b>More Info</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="row">
                        <div class="col-12">
                            <h4>No Customer Found!</h4>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal More Info-->
<div class="modal fade" id="viewBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="form-group h6 pt-4">
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
                </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <b>Book Details :</b><br>
                        <span id="details"></span>
                    </div>
                    <div class="form-group">
                        <b>Book Description :</b><br>
                        <span id="description"></span>
                    </div>
                    <div class="form-group h6">
                        <b>Available Stock :</b> <span id="available"></span>
                    </div>
                   
                </div>
            </div>
        </div>
        <form action="{{route('transaction.processing')}}" method="post" id="approved_frm">
        @method('PUT')
            @csrf
            <input type="text" name="trans_id" hidden>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning btn-sm">Approved</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Cancel-->
<div class="modal fade" id="cancelBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Purchase Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            Are you sure want to cancel your book order?
            <input type="text" name="trans_id" hidden>
            <label for="">Reason/Why?</label>
            <select class="custom-select" name="reason" id="inputGroupSelect01" required>
                <option value="Out of Stock">Out of Stock</option>
                <option value="Need to update book information">Need to update book information</option>
            </select>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-warning btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection