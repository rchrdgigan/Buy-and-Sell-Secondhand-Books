@extends('../layouts.admin') 
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="input-group-prepend">
                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu" style="">
                        <a class="dropdown-item" href="#"><i class="fas fa-eye text-primary"></i> View Information</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-times text-danger"></i> Block User</a>
                      </div>
                    </div>
                    <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('../vendor/dist/img/avatar5.png')}}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center mb-3">First Middle Last</h3>

                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                        <b><i class="fas fa-venus-mars"></i> Gender</b> <a class="float-right">Male</a>
                        </li>
                        <li class="list-group-item">
                        <b><i class="fas fa-venus-mars"></i> Address</b> <a class="float-right">Brgy. Palale</a>
                        </li>
                        <li class="list-group-item">
                        <b><i class="far fa-address-book"></i> Contact Number</b> <a class="float-right">09312312312</a>
                        </li>
                        <li class="list-group-item">
                        <b><i class="far fa-address-book"></i> Email address</b> <a class="float-right">example@email.com</a>
                        </li>
                        <li class="list-group-item">
                        <b><i class="far fa-address-book"></i> Status</b> <a class="float-right bg-success rounded-circle">active</a>
                        </li>
                      </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="profile-username">Personal Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                    <b><i class="fas fa-venus-mars"></i> Birth Date</b> <a class="float-right">Male</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b><i class="fas fa-venus-mars"></i> Address</b> <a class="float-right">Brgy. Palale</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b><i class="far fa-address-book"></i> Contact Number</b> <a class="float-right">09312312312</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b><i class="far fa-address-book"></i> Email address</b> <a class="float-right">example@email.com</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b><i class="far fa-address-book"></i> Status</b> <a class="float-right bg-success rounded-circle">active</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                    <b><i class="fas fa-venus-mars"></i> Gender</b> <a class="float-right">Male</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b><i class="fas fa-venus-mars"></i> Address</b> <a class="float-right">Brgy. Palale</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b><i class="far fa-address-book"></i> Contact Number</b> <a class="float-right">09312312312</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b><i class="far fa-address-book"></i> Email address</b> <a class="float-right">example@email.com</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b><i class="far fa-address-book"></i> Status</b> <a class="float-right bg-success rounded-circle">active</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
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