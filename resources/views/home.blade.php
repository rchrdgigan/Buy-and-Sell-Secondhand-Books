@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-warning">Profile</div>

                <div class="card-body box-profile">
                <div class="container">
                    <div class="picture-container">
                        <div class="picture">
                            <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="">
                            <input type="file" id="wizard-picture" class="">
                        </div>
                        <h6 class="">Choose Picture</h6>
                    </div>
                    
                </div>
                
                <h3 class="profile-username text-center mb-5">{{auth()->user()->name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Email : {{auth()->user()->email}}</b>
                    </li>
                    <li class="list-group-item">
                    <b>Address : Bulan, Sorsogon</b>
                    </li>
                    <li class="list-group-item">
                    <a href="#" class="btn btn-warning btn-block"><b>Update Profile Picture</b></a>
                    </li>
                </ul>

                
              </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning">Edit Information</div>
                <div class="card-body box-profile">
                <form action="" method="POST">
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <label for="fname" class="p-1">First Name :</label>
                            <input id="fname" type="text" class="@error('fname') is-invalid @enderror form-control" 
                                    placeholder="Enter First Name" required>

                            <label for="fname" class="p-1">Last Name :</label>
                            <input id="fname" type="text" class="@error('fname') is-invalid @enderror form-control" 
                                    placeholder="Enter First Name" required>
                        </div>

                        <div class="col-6">
                            <label for="mname" class="p-1">Middle Name :</label>
                            <input id="mname" type="text" class="@error('mname') is-invalid @enderror form-control" 
                                    placeholder="Enter Middle Name" required>

                            <label for="fname" class="p-1">Gender :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-12">
                            <label for="email" class="p-1">Email :</label>
                            <input id="email" type="text" class="@error('email') is-invalid @enderror form-control" 
                                    placeholder="Enter Email Ex: user@domain.com" required>

                            <label for="bdate" class="p-1">Birth Date :</label>
                            <input id="bdate" type="date" class="@error('bdate') is-invalid @enderror form-control" required>

                            <label for="brgy" class="p-1">Brgy. :</label>
                            <input id="brgy" type="text" class="@error('brgy') is-invalid @enderror form-control" 
                                    placeholder="Enter Brgy." required>

                            <label for="street" class="p-1">Street :</label>
                            <input id="street" type="text" class="@error('street') is-invalid @enderror form-control" 
                                    placeholder="Enter Street" required>

                            <label for="purok" class="p-1">Purok :</label>
                            <input id="bdate" type="text" class="@error('bdate') is-invalid @enderror form-control" 
                                    placeholder="Enter Purok" required>

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
