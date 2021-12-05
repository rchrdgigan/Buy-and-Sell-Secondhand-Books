@extends('../layouts.admin') 
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
        <h3 class="card-title">History Log</h3>
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
                <th>Date of Unblocked</th>
                <th>Status</th>
                <th>Tools</th>
            </tr>
            </thead>
            <tbody>
            @foreach($report->where('status', 'draft') as $data)
            <tr>
                <td hidden="">{{$data->id}}</td>
                <td>{{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->date_of_blocked}}</td>
                <td>{{$data->date_of_unblocked}}</td>
                <td><span class="bg-secondary rounded-circle p-1">draft</span></td>
                <td>
                    <form action="{{route('reported.del',$data->id)}}" method="post">
                        @method("DELETE")
                        @csrf
                        <a href="{{route('view.reported',$data->id)}}" class="btn btn-primary .btn-md" ><i class="nav-icon fas fa-eye"></i> View</a>
                        <button type="submit" class="btn btn-danger .btn-md"><i class="nav-icon fas fa-trash"></i> Delete</button>
                    </form>
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