<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('judul halaman')</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{env('CDN_URL')}}visitor/css/modern-business.css">

  <!-- Custom styles for this template -->
  <link href="{{env('CDN_URL')}}visitor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>

   <!-- Custom styles for this template -->
  <link href="{{env('CDN_URL')}}visitor/style-footer.css" rel="stylesheet">
  
  <style>
    #judul h1 { 
      font-family: 'Lobster';
      text-align: center;
      color: #1E90FF; 
    }

    #footer {
      margin-top: 20px;
    }
  </style>

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{env('CDN_URL').'/visitor/img/Virtual-Job-Fair.png'}}" alt="Logo" style="width:100px;">
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- id="navbarResponsive" -->
      <a class="btn btn-outline-primary" href="{{url('/login')}}">Login</a>
    </div>
  </nav>

  <!-- Page Content -->
  
    @yield('content')
  
  <!-- /.container -->

  <!-- Footer -->
  <div id="footer">
    <div>
      <div id="connect"> <a href="#"><img src="{{env('CDN_URL').'/image_footer/icon-facebook.gif'}}" alt="" /></a> <a href="#"><img src="{{env('CDN_URL').'/image_footer/icon-twitter.gif'}}" alt="" /></a> <a href="#"><img src="{{env('CDN_URL').'/image_footer/icon-youtube.gif'}}" alt="" /></a> </div>
      <div class="section">
        <p>Copyright &copy; <a href="#">www.job-fair.com</a> - All Rights Reserved</a></p>
      </div>
    </div>
  </div>

  <!-- Bootstrap   core JavaScript -->
  <script src="{{env('CDN_URL')}}visitor/vendor/jquery/jquery.min.js"></script>
  <script src="{{env('CDN_URL')}}visitor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>