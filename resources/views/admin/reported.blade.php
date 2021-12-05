@extends('../layouts.admin') 
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
        <h3 class="card-title">Reported Users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered table-striped" id="all">
            <thead>
            <tr>
                <th hidden="">No.</th>
                <th>Full Name</th>
                <th>Date of Reported</th>
                <th>Status</th>
                <th>Tools</th>
            </tr>
            </thead>
            <tbody>
            @foreach($report->where('status', 'log') as $data)
            <tr>
                <td hidden="">{{$data->id}}</td>
                <td>{{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}</td>
                <td>{{$data->created_at}}</td>
                <td><span class="bg-success rounded-circle p-1">normal</span></td>
                <td>
                    <a href="{{route('view.reported',$data->id)}}" class="btn btn-primary .btn-md" ><i class="nav-icon fas fa-eye"></i> View</a>
                    <a href="{{route('block.status',['user_id'=> $data->user_id , 'status_code' => 'blocked'])}}" class="btn btn-danger .btn-md"><i class="nav-icon fas fa-times-circle"></i> Block</a>
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