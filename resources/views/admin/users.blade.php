<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NORSU DASHBOARD BULLETIN</title>

    <!-- Custom fonts for this template -->
    <link href="{{URL::to('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{URL::to('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{URL::to('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               
                <div class="sidebar-brand-text mx-3">NORSU DASHBOARD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

          
            <hr class="sidebar-divider">

            <!-- Heading -->
           
            <!-- Divider -->
            <hr class="sidebar-divider">

          

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/users')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>USERS</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/category')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>CATEGORY</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/bulletin')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>BULLETIN</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                   

                   
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                      


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{URL::to('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <a class="dropdown-item" href="{{route('settings')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">USER LIST</h1>
                    @include('shared.notification')
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createUsers">NEW USERS</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        @foreach ($all as $user)
                                        <tr>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <button class="btn btn-info btn-sm edit" value="{{$user->id}}" data-toggle="modal" data-target="#updateUsers">EDIT</button>
                                                <button class="btn btn-danger btn-sm delete" value="{{$user->id}}" data-toggle="modal" data-target="#usersDelete">DELETE</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="createUsers">
        <div class="modal-dialog">
          <div class="modal-content">
  
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Users Information</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
  
            <!-- Modal body -->
            <form action="{{route('users_check')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                      <div class="form-group">
                          <label><strong>First name</strong></label>
                          <input type="text" name="first_name" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label><strong>Last name</strong></label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><strong>Email</strong></label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><strong>Phone</strong></label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
  
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
  
          </div>
        </div>
      </div>

      <div class="modal" id="updateUsers">
        <div class="modal-dialog">
          <div class="modal-content">
  
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Users Information</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
  
            <!-- Modal body -->
            <form action="{{route('users_update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" id="usersHasEdit">
                <div class="modal-body">
                      <div class="form-group">
                          <label><strong>First name</strong></label>
                          <input type="text" name="first_name" id="first_name" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label><strong>Last name</strong></label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><strong>Email</strong></label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><strong>Phone</strong></label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                </div>
  
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
  
          </div>
        </div>
      </div>

      <div class="modal" id="usersDelete">
        <div class="modal-dialog">
          <div class="modal-content">
  
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Are you sure you want to delete?</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
  
           
  
            <!-- Modal footer -->
            <div class="modal-footer">
             <form action="{{route('users_delete')}}" method="POST">
                  @csrf
                  <input type="hidden" name="users_id" id="usersHasDelete">
                  <button class="btn btn-primary">YES</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
             </form>
            </div>
  
          </div>
        </div>
      </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{URL::to('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{URL::to('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{URL::to('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{URL::to('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::to('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{URL::to('js/demo/datatables-demo.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var find_user_route = '{{route("users_find")}}';
            var token = '{{Session::token()}}';
          

          $(".delete").click(function(){
                var users_id = $(this).val();

                $("#usersHasDelete").val(users_id);
          });

          $(".edit").click(function(){
                var users_id = $(this).val();

                $("#usersHasEdit").val(users_id);

                $.ajax({
                   type:'POST',
                   url:find_user_route,
                   data:{_token: token, users_id: users_id},
                   success:function(data) {
                      console.log(data);
                      $("#first_name").val(data.first_name);
                      $("#last_name").val(data.last_name);
                      $("#email").val(data.email);
                      $("#phone").val(data.phone);
                      
                   }
                });
          });

        });
    </script>

</body>

</html>