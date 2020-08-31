<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Admin Jobfair</title>

        <!-- Custom fonts for this template-->
        <link href="{{env('CDN_URL')}}/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{env('CDN_URL')}}/admin/css/sb-admin-2.min.css" rel="stylesheet">

    </head>
    <body id="page-top">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block"><img src="{{env('CDN_URL').'/admin/img/register.png'}}" alt=""></div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Register Admin</h1>
                                            </div>
                                            <form class="user" action="{{ url('/registerPost') }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <input type="text" name="nama" class="form-control form-control-user" id="exampleInputNama" placeholder="Enter Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-check-label" for="exampleCheck1">Active</label>
                                                    <input type="checkbox" name="active" checked="" class="form-control" id="exampleCheck1">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    Register
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(\Session::has('alert'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert')}}</div>
                </div>
                @endif
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{env('CDN_URL')}}admin/vendor/jquery/jquery.min.js"></script>
        <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{env('CDN_URL')}}admin/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{env('CDN_URL')}}admin/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="{{env('CDN_URL')}}admin/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="{{env('CDN_URL')}}admin/js/demo/chart-area-demo.js"></script>
        <script src="{{env('CDN_URL')}}admin/js/demo/chart-pie-demo.js"></script>
    </body>
</html>
