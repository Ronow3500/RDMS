@extends('layouts/main')

@section('content')
 
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('assets/dist/img/user4-128x128.jpg') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->name ?? '' }}</h3>

                <p class="text-muted text-center">{{ $user->email ?? '' }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Activities</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Joined</b> <a class="float-right">
                      {{ $user->created_at->format('d/m/Y') }}
                    </a>
                  </li>
                  <li class="list-group-item">
                    
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block" disabled><b>
                 @foreach($user->roles as $role)
                    {{ $role->name }},
                 @endforeach
                </b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Update Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                 <form method="post" action="{{ route('admin.users.update',$user->id) }}">
                    @method('patch')
                    @csrf
    <div class="row">
        <div class="col">
         <div class="mb-3">
           <label for="name">Name</label>
           <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="@isset($create) {{ old('name') }} @endisset @isset($user) {{ $user->name }} @endisset" aria-describedby="name">
            @error('name')
            <span class="invalid-feedback" role="alert">
             {{ $message }}
            </span>
            @enderror
         </div> 
        </div>
        <div class="col">
          <div class="mb-3">
          <label for="email">Email</label>
          <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="@isset($create) {{ old('email') }} @endisset @isset($user) {{ $user->email }} @endisset" aria-describedby="email">
          @error('email')
          <span class="invalid-feedback" role="alert">
              {{ $message }}
          </span>
          @enderror
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col mb-3">
        @isset($create)
        <label for="password">Password</label>
        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
       @error('password')
       <span class="invalid-feedback" role="alert">
           {{ $message }}
       </span>
       @enderror
       @endisset
     </div>
     <div class="col mb-3">
       @isset($create)
       <label for="password_confirmation">Confirm Password</label>
       <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
       @error('password_confirmation')
       <span class="invalid-feedback" role="alert">
           {{ $message }}
       </span>
       @enderror
       @endisset
     </div>
     <div class="col mb-3">
        
    </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
                 </form>
             </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About {{ $user->name ?? '' }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Research Methodologies from the Great University
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Kabarsiran, Nairobi Kenya</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Scripting,</span>
                  <span class="tag tag-success">Coding,</span>
                  <span class="tag tag-info">Research,</span>
                  <span class="tag tag-warning">Field Experience,</span>
                  <span class="tag tag-primary">Call Center.</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endSection