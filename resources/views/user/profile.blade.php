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
                       src="{{ asset('assets/dist/img/avatar.png') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ auth()->user()->name ?? '' }}</h3>

                <p class="text-muted text-center">{{ auth()->user()->email ?? '' }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Activities</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Joined</b> <a class="float-right">
                      {{ auth()->user()->created_at->format('d/m/Y') }}
                    </a>
                  </li>
                  <li class="list-group-item">
                    
                  </li>
                </ul>

                <ul class="nav nav-pills">
                  @foreach(auth()->user()->roles as $role)
                  <li class="nav-item"><a class="nav-link active" href="#" data-toggle="tab">
                    {{ $role->name }}
                  </a></li>
                  @endforeach
                </ul>

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
                 <form method="post" action="{{ route('user-profile-information.update') }}">
                    @method('put')
                    @csrf
    <div class="row">
        <div class="col">
         <div class="mb-3">
           <label for="name">Name</label>
           <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}" aria-describedby="name">
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
          <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" aria-describedby="email" disabled>
          @error('email')
          <span class="invalid-feedback" role="alert">
              {{ $message }}
          </span>
          @enderror
          </div>
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

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endSection
