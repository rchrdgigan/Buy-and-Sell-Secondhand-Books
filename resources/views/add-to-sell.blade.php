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
        <h6 class="float-right"><a href="{{route('my.shop')}}">My Shop</a> / My Book</h6>
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
                <div class="card-header bg-warning">
                  <h5>Selling Books <a type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addBook"><span> Add Book</span></a></h5>
                </div>
                <div class="card-body">
                    <table class="display table table-responsive table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>Cancel</th>
                                <th>Images</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($book->sortDesc() as $data)
                            <tr>
                                <td>
                                    <a type="button" class="btn btn-danger open-AddBookDialog" data-id="{{$data->id}}" data-toggle="modal" data-target="#delBook">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </td>
                                <td><a href="#"><img height="75" src="/public/book_image/{{$data->image}}"></a></td>
                                <td><a href="#">{{$data->name}}</a></td>
                                <td>{{$data->category}}</td>
                                <td><span class="amount">{{$data->unit_price}}</span></td>
                                <td><span class="amount">{{$data->quantity}}</span></td>
                                <td><span class="amount">{{$data->total_amount}}</span></td>
                                <td><span class="amount bg-success text-white p-1 rounded">selling</span></td>
                                <td>
                                    <a type="button" class="btn btn-primary" 
                                    book_title="{{$data->name}}"
                                    book_desc="{{$data->description}}"
                                    book_detail="{{$data->details}}"
                                    book_cat="{{$data->category}}"
                                    price="{{$data->unit_price}}"
                                    quantity="{{$data->quantity}}"
                                    total="{{$data->total_amount}}"
                                    image="/public/book_image/{{$data->image}}"

                                    data-toggle="modal" data-target="#viewBooks">
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


<!-- Modal Add-->
<div class="modal fade" id="addBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Books Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('add.book')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputFile">Image</label>
                          <div class="input-group">
                              <input class="form-control" type="file" name="image">
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="name" class="p-1">Book Title :</label>
                          <input id="name" name="name" type="text" class="@error('name') is-invalid @enderror form-control" 
                                  placeholder="Enter Book Name" required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="summernoteDescription" class="p-1">Book Description :</label>
                      <textarea id="summernoteDescription" type="text"  name="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror" 
                      autocomplete="description" placeholder="Enter Book Description" required></textarea>
                    </div>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group">
                      <label for="details" class="p-1">Book Details :</label>
                      <textarea id="summernoteDetails" type="text"  name="details" class="@error('details') is-invalid @enderror form-control" 
                              placeholder="Enter Book Details" required></textarea>
                    </div>
                    
                    <div class="form-group">
                      <label>Select Categories</label>
                      <select name="categories" id="InputCategories" class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true" required>
                          @foreach($category as $data)
                          <option value="{{$data->category_title}}">{{$data->category_title}}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="quantity" class="p-1">Quantity :</label>
                        <input id="quantity" name="quantity" type="number" onchange="multiply()" class="@error('quantity') is-invalid @enderror form-control" 
                                placeholder="Enter Quantity" required>
                      </div>

                      <div class="form-group col-6">
                        <label for="unit_price" class="p-1">Unit Price :</label>
                        <input id="unit_price" name="unit_price" type="number" onchange="multiply()" class="@error('unit_price') is-invalid @enderror form-control" 
                                placeholder="Enter Unit Price" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="total_amount" class="p-1">Total Amount :</label>
                      <input id="total_amount" name="total_amount" type="number" class="@error('total_amount') is-invalid @enderror form-control" 
                              value="0" required>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Delete-->
<div class="modal fade" id="delBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Books Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('del.book')}}" id="delete_frm" method="post">
        @method('DELETE')
        @csrf
        <div class="modal-body">
            Are you sure want delete this book ?
            <input type="text" id="bookId" name="id" hidden>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal View-->
<div class="modal fade" id="viewBooks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="exampleModalLabel">Books Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="container">
                        <div class="picture-container">
                            <div class="picture">
                                <img class="picture-src" id="image">
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4">
                      <div class="form-group col-6">
                            <b class="p-1">Book Title :</b><br>
                            <span id="book"></span>
                      </div>
                      <div class="form-group col-6">
                        <b>Book Categories :</b><br>
                        <span id="book_cat"></span>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <b class="p-1">Book Description :</b>
                        <span id="book_desc"></span>
                      </div>
                      <div class="form-group col-6">
                        <b class="p-1">Book Details :</b>
                        <span id="book_detail"></span>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <b class="p-1">Quantity :</b><br>
                        <span id="qty"></span>
                      </div>

                      <div class="form-group col-6">
                        <b for="unit_price" class="p-1">Unit Price :</b><br>
                        <span id="price"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <b for="total_amount" class="p-1">Total Amount :</b><br>
                      <span id="total"></span>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
