@extends('layouts/main')

@section('content')
 
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-3">
            <div class="card">
              <div class="card-body">
                @switch($respondent->gender)
                @case($respondent->gender == "Male")
                    <img class="card-img-top img-fluid" style="height: 100px; width: 100px;"
               src="{{ asset('assets/dist/img/avatar4.png') }}" alt="Male avatar">
                    @break

                @case($respondent->gender == "male")
                    <img class="card-img-top img-fluid" style="height: 100px; width: 100px;"
               src="{{ asset('assets/dist/img/avatar4.png') }}" alt="Male avatar">
                    @break

                @case($respondent->gender == "Female")
                    <img class="card-img-top img-fluid" style="height: 100px; width: 100px;"
               src="{{ asset('assets/dist/img/avatar3.png') }}" alt="Female avatar">
                    @break

                @case($respondent->gender == "female")
                    <img class="card-img-top img-fluid" style="height: 100px; width: 100px;"
               src="{{ asset('assets/dist/img/avatar3.png') }}" alt="Female avatar">
                    @break

                @default
                    <img class="card-img-top img-fluid" style="height: 100px; width: 100px;"
               src="{{ asset('assets/dist/img/boxed-bg.jpg') }}" alt="Default avatar">
                @endswitch
                <h4>{{ $respondent->name }}</h4>
                <h6><span class="text-primary">Id : </span>{{ $respondent->r_id }}</h6>
                <hr>
                <ul class="list-group">
                  <div class="bg-warning">
                    <p class="card-text text-light text-center">Contacts :</p>
                  </div>
                  @if($respondent->phone_1)
                  <li class="list-group-item">Phone 1: <a href="tel:{{ $respondent->phone_1 }}">{{ $respondent->phone_1 }}</a></li>
                  @endif
                  @if($respondent->phone_2)
                  <li class="list-group-item">Phone 2: <a href="tel:{{ $respondent->phone_2 }}">{{ $respondent->phone_2 }}</a></li>
                  @endif
                  @if($respondent->phone_3)
                  <li class="list-group-item">Phone 3: <a href="tel:{{ $respondent->phone_3 }}">{{ $respondent->phone_3 }}</a></li>
                  @endif
                  @if($respondent->phone_4)
                  <li class="list-group-item">Phone 4: <a href="tel:{{ $respondent->phone_4 }}">{{ $respondent->phone_4 }}</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
          <div class="col-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About {{ $respondent->name }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="text-primary fas fa-book mr-1"></i> Education Level</strong>

                <p class="text-muted">
                  @if($respondent->education_level)
                  {{ $respondent->education_level }}
                  @else
                  Not specified
                  @endif
                </p>

                <hr>

                <strong><i class="text-warning fas fa-map-marker-alt mr-1"></i> Location</strong>

            <div class="table-responsive">
              <table class="table">
                <thead class="thead-dark">
                  <th>Region</th>
                  <th>County</th>
                  <th>District</th>
                  <th>Location</th>
                  <th>Sub Location</th>
                  <th>Ward</th>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $respondent->region }}</td>
                    <td>{{ $respondent->county }}</td>
                    <td>{{ $respondent->district }}</td>
                    <td>{{ $respondent->location }}</td>
                    <td>{{ $respondent->sub_location }}</td>
                    <td>{{ $respondent->ward }}</td>
                  </tr>
                </tbody>
                <thead class="thead-light">
                  @if($respondent->ethnic_group)
                  <th>Ethnic Group</th>
                  @endif
                  @if($respondent->sub_county)
                  <th>Sub County</th>
                  @endif
                  @if($respondent->division)
                  <th>Division</th>
                  @endif
                </thead>
                <tbody>
                  <tr>
                    @if($respondent->ethnic_group)
                    <td>{{ $respondent->ethnic_group }}</td>
                    @endif
                    @if($respondent->sub_county)
                    <td>{{ $respondent->sub_county }}</td>
                    @endif
                    @if($respondent->division)
                    <td>{{ $respondent->division }}</td>
                    @endif
                  </tr>
                </tbody>
              </table>
            </div>

                <hr>

                <strong><i class="fas fa-venus-mars mr-1" title="Gender"></i><i class="fas fa-birthday-cake mr-1" title="age"></i> Age and Gender</strong>

                <div class="table-responsive">
              <table class="table">
                <thead class="thead-dark">
                  @if($respondent->exact_age)
                  <th>Age (Yrs)</th>
                  @endif
                  @if($respondent->gender)
                  <th>Gender</th>
                  @endif
                  @if($respondent->age_group)
                  <th>Age Group</th>
                  @endif
                </thead>
                <tbody>
                  <tr>
                    @if($respondent->exact_age)
                    <td>{{ $respondent->exact_age }}</td>
                    @endif
                    @if($respondent->exact_age)
                    <td>{{ $respondent->gender }}</td>
                    @endif
                    @if($respondent->age_group)
                    <td>{{ $respondent->age_group }}</td>
                    @endif
                  </tr>
                </tbody>
              </table>
            </div>

                <hr>

                <strong><i class="fas fa-pray mr-1" title="religious status"></i><i class="fas fa-ring mr-1" title="marital status"></i><i class="fas fa-laptop mr-1" title="employment status"></i>
                 Social Status</strong>

                 <ul class="list-group">
                  @if($respondent->marital_status)
                   <li class="list-group-item list-group-item-primary">
                    <strong>Marital Status: </strong>{{ $respondent->marital_status }}
                   </li>
                  @endif
                  @if($respondent->religion)
                   <li class="list-group-item list-group-item-primary">
                     <strong>Religious Status: </strong> {{ $respondent->religion }}
                   </li>
                   @endif
                   @if($respondent->employment_status)
                   <li class="list-group-item list-group-item-primary">
                     <strong>Employment Status: </strong> {{ $respondent->employment_status }}
                   </li>
                   @endif
                 </ul>

              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <hr>
        
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endSection