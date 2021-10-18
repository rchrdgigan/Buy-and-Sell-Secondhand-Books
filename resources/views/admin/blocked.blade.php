@extends('../layouts.admin') 
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
        <h3 class="card-title">Blocked Users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered table-striped">
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
            <tr>
                <td hidden="">No.</td>
                <td>Full Name</td>
                <td>Date of Reported</td>
                <td>Date of Blocked</td>
                <td>Date of Unblocked</td>
                <td><span class="bg-danger rounded-circle p-1">blocked</span></td>
                <td>
                    <a href="" class="btn btn-primary .btn-md"><i class="nav-icon fas fa-eye"></i> View</a>
                    <a href="" class="btn btn-danger .btn-md"><i class="nav-icon fas fa-times-circle"></i> Unblock</a>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection