@extends('../layouts.admin') 
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
        <h3 class="card-title">Veiw Reported Information</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @foreach($report as $data)
            <div class="row">
                <div class="col-4">
                    <div class="text-header">
                       <b>Reported User:</b> 
                    </div>
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="/public/users_image/{{$data->user_image}}" alt="User profile picture">
                    </div>
                    <p class="profile-username text-center text-md">{{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}</p>

                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item p-1 text-sm">
                        <b><i class="fas fa-venus-mars"></i> Gender : </b> <a class="">{{$data->gender}}</a>
                        </li>
                        <li class="list-group-item p-1 text-sm">
                        <b><i class="fas fa-house-user"></i> Address : </b> <a class="">{{$data->brgy}} {{$data->street}} {{$data->purok}}</a>
                        </li>
                        <li class="list-group-item p-1 text-sm">
                        <i class="fas fa-birthday-cake"></i> Birthdate : </b> <a class="">{{Carbon\Carbon::parse($data->birthdate)->format('Y-m-d')}}</a>
                        </li>
                        <li class="list-group-item p-1 text-sm">
                        <b><i class="far fa-address-book"></i> Contact Number : </b> <a class="">{{$data->contact}}</a>
                        </li>
                        <li class="list-group-item p-1 text-sm">
                        <b><i class="fas fa-envelope"></i> Email address : </b> <a class="">{{$data->email}}</a>
                        </li>
                        <li class="list-group-item p-1 text-sm">
                        @if($data->user_status == "pending")
                        <b><i class="fas fa-info-circle"></i> Status : </b> <a class=" bg-secondary rounded">{{$data->user_status}}</a>
                        @elseif($data->user_status == "approved")
                        <b><i class="fas fa-info-circle"></i> Status : </b> <a class=" bg-success rounded">active</a>
                        @elseif($data->user_status == "blocked")
                        <b><i class="fas fa-info-circle"></i> Status : </b> <a class=" bg-danger rounded">{{$data->user_status}}</a>
                        @endif
                        </li>
                      </ul>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-header">
                                <b>Reported by:</b>   
                            </div>
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/public/users_image/{{$data->user2_image}}" alt="User profile picture">
                            </div>
                            <p class="profile-username text-center text-md">{{$data->first2_name}} {{$data->middle2_name}} {{$data->last2_name}}</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item p-1 text-sm">
                                <b><i class="fas fa-venus-mars"></i> Gender : </b> <a class="">{{$data->gender2}}</a>
                                </li>
                                <li class="list-group-item p-1 text-sm">
                                <b><i class="fas fa-house-user"></i> Address : </b> <a class="">{{$data->brgy2}} {{$data->street2}} {{$data->purok2}}</a>
                                </li>
                                <li class="list-group-item p-1 text-sm">
                                <i class="fas fa-birthday-cake"></i> Birthdate : </b> <a class="">{{Carbon\Carbon::parse($data->birthdate2)->format('Y-m-d')}}</a>
                                </li>
                                <li class="list-group-item p-1 text-sm">
                                <b><i class="far fa-address-book"></i> Contact Number : </b> <a class="">{{$data->contact2}}</a>
                                </li>
                                <li class="list-group-item p-1 text-sm">
                                <b><i class="fas fa-envelope"></i> Email address : </b> <a class="">{{$data->email2}}</a>
                                </li>
                                <li class="list-group-item p-1 text-sm">
                                @if($data->user2_status == "pending")
                                <b><i class="fas fa-info-circle"></i> Status : </b> <a class=" bg-secondary rounded">{{$data->user2_status}}</a>
                                @elseif($data->user2_status == "approved")
                                <b><i class="fas fa-info-circle"></i> Status : </b> <a class=" bg-success rounded">active</a>
                                @elseif($data->user2_status == "blocked")
                                <b><i class="fas fa-info-circle"></i> Status : </b> <a class=" bg-danger rounded">{{$data->user2_status}}</a>
                                @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <div class="text-header">
                                <b>Reason:</b> 
                                <p>{{$data->reason}}</p>  
                            </div>
                            <div class="text-header">
                                <b>Uploaded Proof:</b><br>
                                <a href="/public/report_prof/{{$data->valid_prof}}">View proof</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection