@extends('../layouts.admin') 
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
       @if(session('success_message'))
            <div class="alert alert-success alert-dismissible">
                {{ session('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 mb-3">
                <form action="{{route('search.user')}}" method="get" enctype="multipart/form-data">
                  @csrf
                    <div class="input-group">
                        <input type="search" name="srch" class="form-control form-control-md" placeholder="Filter by status or name...   Example : Pending, Blocked or Name etc.">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-md btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @foreach($user_data as $data)
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="input-group-prepend">
                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Action
                      </button>
                      <form action="{{route('destroy.user', $data->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="dropdown-menu" style="">
                          <a class="dropdown-item text-sm" href="../public/valid_prof/{{$data->valid_prof}}"><i class="fas fa-eye text-primary"></i> View ID</a>
                          @if($data->status == "approved")
                            
                          @elseif($data->status == "pending")
                            <a class="dropdown-item text-sm" href="{{route('update.status',['user_id'=> $data->id , 'status_code' => 'approved'])}}"><i class="fas fa-check text-success"></i> Approved User</a>
                          @endif
                          <button type="submit" class="dropdown-item text-sm"><i class="fas fa-trash text-danger"></i> Remove this User</button>
                        </div>
                      </form>
                    </div>
                    <div class="card-body box-profile p-2">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="../public/users_image/{{$data->image}}" alt="User profile picture">
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
                        @if($data->status == "pending")
                        <b><i class="fas fa-info-circle"></i> Status : </b> <a class=" bg-secondary rounded">{{$data->status}}</a>
                        @elseif($data->status == "approved")
                        <b><i class="fas fa-info-circle"></i> Status : </b> <a class=" bg-success rounded">active</a>
                        @elseif($data->status == "blocked")
                        <b><i class="fas fa-info-circle"></i> Status : </b> <a class=" bg-danger rounded">{{$data->status}}</a>
                        @endif
                        </li>
                      </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
          @endforeach
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- Modal Delete -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-danger">
      <form action="">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to remove this data?
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