<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $title ?? config('app.name') }}</title>
  <meta charset="utf-8">
  <meta name="description" content="TIFA Respondents Database Management System">
  <meta name="author" content="{{ $authors ?? '' }}">
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

<div class="jumbotron bg-primary text-center" style="margin-bottom:0">

    <div class="row">
      <div class="col-md-6 mt-3 mb-3">
        <a href="{{ url('/') }}">
          <img src="./assets/images/logo.png" class="img-thumbnail img-fluid" alt="TIFA Research">
        </a>
      </div>

    <div draggable="true" class="col-md-6 bg-primary">
      <div class="mt-5 text-light">
        <h1>{{ $title ?? ''; }}</h1>
      </div>
    </div>
    </div>
   
</div>

<div class="jumbotron bg-warning" style="height: 100vh;">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card card-login mx-auto mt-5 mb-5">
      <div class="card-header text-center">
        <div class="row">
          <div class="col">
            <h3 class="text-primary">
              Login To Proceed
            </h3>
          </div>
          <div class="col">
            @if(session('status'))
               <div class="alert alert-info" role="alert">
                    {{ session('status') }}
               </div>
            @endif
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('login') }}" method="post" accept-charset="utf-8">
           @csrf
            <div class="form-group">
              <div class="form-label-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your Email" name="email" value="{{ old('email') }}" required>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            
            <div class="row mt-4">
              <div class="col">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </div>
              <div class="col">
                <a href="{{ route('password.request') }}" class="btn btn-warning" title="Reset it here">Umesahau Password ?</a>
              </div>
            </div>
          </form>
      </div>
    </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

</body>
</html>
