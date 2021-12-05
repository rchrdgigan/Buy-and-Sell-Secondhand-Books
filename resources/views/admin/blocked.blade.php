@extends('../layouts.admin') 
@section('content')
<div class="container-fluid">
    @if(session('message'))
        <div class="alert alert-success alert-dismissible">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-primary">
        <h3 class="card-title">Blocked Users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered table-striped" id="all">
            <thead>
            <tr>
                <th hidden="">No.</th>
                <th>Full Name</th>
                <th>Date of Reported</th>
                <th>Date of Blocked</th>
                <th>Status</th>
                <th>Tools</th>
            </tr>
            </thead>
            <tbody>
            @foreach($report->where('status', 'blocked') as $data)
            <tr>
                <td hidden="">{{$data->id}}</td>
                <td>{{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->date_of_blocked}}</td>
                <td><span class="bg-success rounded-circle p-1">blocked</span></td>
                <td>
                    <a href="{{route('view.reported',$data->id)}}" class="btn btn-primary .btn-md" ><i class="nav-icon fas fa-eye"></i> View</a>
                    <a href="{{route('unblock.status',['user_id'=> $data->user_id , 'status_code' => 'approved'])}}" class="btn btn-success .btn-md"><i class="nav-icon fas fa-check"></i> Unblock</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection