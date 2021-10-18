@extends('../layouts.admin') 
@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>2</h3>
              <p>Reported Listed</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>20</h3>
              <p>Buyer/Seller</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-12">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>10</h3>
              <p>Blocked Listed</p>
            </div>
            <div class="icon">
              <i class="fas fa-times"></i>
            </div>
            <a href="/admin/student/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    <div class="card">
        <div class="card-header bg-primary">
        <h3 class="card-title">Reported Users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered table-striped">
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
            <tr>
                <td hidden="">No.</td>
                <td>Full Name</td>
                <td>Date of Reported</td>
                <td><span class="bg-success rounded-circle p-1">active</span></td>
                <td>
                    <a href="" class="btn btn-primary .btn-md"><i class="nav-icon fas fa-eye"></i> View</a>
                    <a href="" class="btn btn-danger .btn-md"><i class="nav-icon fas fa-times-circle"></i> Block</a>
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