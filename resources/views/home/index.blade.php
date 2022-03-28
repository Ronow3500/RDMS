<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $title; }}</title>
  <meta charset="utf-8">
  <meta name="description" content="TIFA Airtime & SMS Dispatcher">
  <meta name="author" content="{{ $authors }}">
  <meta name="keywords" content="TIFA Incentives, Airtime & SMS">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

  <!-- Javascript -->
  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

  <!--Fontawesome Kit's Code-->
  <script src="https://kit.fontawesome.com/d7fcc07195.js" crossorigin="anonymous"></script>
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/images/favicon.jpeg"/>
</head>
<body>

<div class="container-fluid">
  <div class="jumbotron bg-warning text-center" style="margin-bottom:0">

    <div class="row">
      <div class="col-md-6 mt-3">
        <img src="./assets/images/logo.png" class="img-thumbnail img-fluid" alt="TIFA Research">
      </div>

    <div draggable="true" class="col-md-6 bg-primary">
      <div class="mt-5 text-light">
        <h1>{{ $title; }}</h1>
        <p>Airtime SMS Dispatcher</p>
      </div>
    </div>
    </div>
   
</div>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card card-login mx-auto mt-5 mb-5">
      <div class="card-header text-center">
        Login To Proceed
      </div>
      <div class="card-body">
        <form action="{{ route('login') }}" method="post" accept-charset="utf-8">
           @csrf
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="email" class="form-control" placeholder="Enter your Email" required="required" /*autofocus="autofocus"*/ name="email" value="">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
      </div>
    </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<div class="bg-primary text-light jumbotron text-center" style="margin-bottom:0">
  <div class="row">
    <div class="col-md-6">
      <h3>About Us</h3>
      <p>
        We are an African based full market research company offering market, social and sports research.
      </p>
    </div>
    <div class="col-md-6">
      <h3>Our Contacts</h3>
      <div style="margin-right: 4px;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">
          <i class="fas fa-map-marker-alt text-warning"></i>
          The Campus, 36, Kabarsiran Rd, off James Gichuru Rd, Lavington, Nairobi, Kenya
        </a>
        <a href="tel:+254728406085" title="call us" class="list-group-item list-group-item-action">
          <i class="fas fa-mobile-alt text-warning"></i>
          +254 728 406 085
        </a>
        <a href="mailto:ask@tifaresearch.com" title="Send us an email" class="list-group-item list-group-item-action">
          <i class="fas fa-envelope text-warning"></i>
          ask@tifaresearch.com
        </a>
      </div>
      </div>
    </div>
  </div>
  <hr class="bg-light">
  <p class="text-warning"> <?= date('Y') ?> | TIFA Research. All rights reserved </p>
</div>
</div>

</body>
</html>
