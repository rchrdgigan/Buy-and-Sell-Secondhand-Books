@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <a href="#" class="btn btn-warning btn-block"><b>Shop Profile</b></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="btn btn-warning btn-block"><b>My Address</b></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="btn btn-warning btn-block"><b>My Books</b></a>
                    </li>
                </ul>
                
              </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-warning">Edit Shop Information</div>
                <div class="card-body box-profile">
                <form action="" method="POST">
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <label for="fname" class="p-1">Shop Name :</label>
                            <input id="fname" type="text" class="@error('fname') is-invalid @enderror form-control" 
                                    placeholder="Enter Shop Name" required>
                        </div>
                    </div>
                    <button class="btn btn-warning mt-2 col-4" type="submit">Save Info</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection