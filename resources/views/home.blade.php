@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{route('home.update.profile')}}" method="POST" enctype="multipart/form-data">
@method('PUT')
    @csrf
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-warning">Profile</div>
                <div class="card-body box-profile">
                <div class="container">
                    <div class="picture-container">
                        <div class="picture">
                            <img src="/storage/users_image/{{auth()->user()->image}}" class="picture-src" id="wizardPicturePreview" title="">
                            <input type="file" name="image" id="wizard-picture" class="">
                        </div>
                        <h6 class="">Choose Picture</h6>
                    </div>
                </div>
                
                <h3 class="profile-username text-center mb-5">{{auth()->user()->first_name}} {{auth()->user()->middle_name}} {{auth()->user()->last_name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Email : </b><span>{{auth()->user()->email}}</span>
                    </li>
                    <li class="list-group-item">
                    <b>Address : </b><span>{{Auth::user()->street}}, {{Auth::user()->brgy}}, {{Auth::user()->purok}}</span>
                    </li>
                    <li class="list-group-item">
                    <button type="submit" class="btn btn-warning btn-block  btn-sm"><b>Update Profile Picture</b></button>
                    </li>
                </ul>

                
              </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning">Edit Information</div>
                <div class="card-body box-profile">
                    <div class="row">
                        <div class="col-6">
                            <label for="fname" class="p-1">First Name :</label>
                            <input id="fname" value="{{auth()->user()->first_name}}" name="first_name" type="text" class="@error('fname') is-invalid @enderror form-control" 
                                    placeholder="Enter First Name" required>

                            <label for="lname" class="p-1">Last Name :</label>
                            <input id="lname" value="{{auth()->user()->middle_name}}" name="last_name" type="text" class="@error('lname') is-invalid @enderror form-control" 
                                    placeholder="Enter First Name" required>
                        </div>

                        <div class="col-6">
                            <label for="mname" class="p-1">Middle Name :</label>
                            <input id="mname" value="{{auth()->user()->last_name}}" name="middle_name" type="text" class="@error('mname') is-invalid @enderror form-control" 
                                    placeholder="Enter Middle Name" required>

                            <label for="gender" class="p-1">Gender :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                </div>
                                <select class="custom-select" name="gender" id="inputGroupSelect01" required>
                                    <option {{(auth()->user()->gender == "Male") ? "selected" : ""}} value="Male">Male</option>
                                    <option {{(auth()->user()->gender == "Female") ? "selected" : ""}} value="Female">Female</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-12">
                            <label for="email" class="p-1">Email :</label>
                            <input id="email" value="{{auth()->user()->email}}" name="email"  type="email" class="@error('email') is-invalid @enderror form-control" 
                                    placeholder="Enter Email Ex: user@domain.com" required>
                            <label for="contact" class="p-1">Contact :</label>
                            <input id="contact" value="{{auth()->user()->contact}}" name="contact" maxlength="11" type="text" class="@error('contact') is-invalid @enderror form-control" 
                                    placeholder="Enter Contact Ex: 09XXXXXXXXX" required>


                            <label for="bdate" class="p-1">Birth Date :</label>
                            <input id="bdate" name="birthdate" value="{{Carbon\Carbon::parse(auth()->user()->birthdate)->format('Y-m-d')}}" type="date" class="@error('bdate') is-invalid @enderror form-control" required>

                            <label for="brgy" class="p-1">Brgy. :</label>
                            <input id="brgy" name="brgy" value="{{auth()->user()->brgy}}" type="text" class="@error('brgy') is-invalid @enderror form-control" 
                                    placeholder="Enter Brgy." required>

                            <label for="street" class="p-1">Street :</label>
                            <input id="street" name="street" value="{{auth()->user()->street}}" type="text" class="@error('street') is-invalid @enderror form-control" 
                                    placeholder="Enter Street" required>

                            <label for="purok" class="p-1">Purok :</label>
                            <input id="purok" name="purok" value="{{auth()->user()->purok}}" type="text" class="@error('purok') is-invalid @enderror form-control" 
                                    placeholder="Enter Purok" required>

                        </div>
                    </div>
                    <button class="btn btn-warning mt-2 float-right btn-sm" type="submit"><b>Update Info</b></button>
                </div>
            </div>
        </div>           
    </div>
</form>
</div>
@endsection
