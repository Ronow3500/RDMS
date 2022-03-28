@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
          <div class="card-body">

                <hr class="bg-warning">
            <div class="table-responsive">
              <table id="example1" class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Respondent Id</th>
                    <th>Name</th>
                    <th>Phone 1</th>
                    <th>Phone 2</th>
                    <th>Phone 3</th>
                    <th>Phone 4</th>
                    <th>Region</th>
                    <th>County</th>
                    <th>Sub County</th>
                    <th>District</th>
                    <th>Division</th>
                    <th>Location</th>
                    <th>Sub Location</th>
                    <th>Ward</th>
                    <th>Constituency</th>
                    <th>Gender</th>
                    <th>Exact Age</th>
                    <th>Age Group</th>
                    <th>Setting</th>
                    <th>Education Level</th>
                    <th>Marital Status</th>
                    <th>Religion</th>
                    <th>Ethnic Group</th>
                    <th>Employment Status</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach($respondents as $respondent)
                  <tr>
                    <td>{{ $respondent->r_id }}</td>
                    <td>
                      <a href="{{ route('respondents.show', $respondent->id) }}">
                        {{ $respondent->name }}
                      </a>
                    </td>
                    <td>{{ $respondent->phone_1 }}</td>
                    <td>{{ $respondent->phone_2 }}</td>
                    <td>{{ $respondent->phone_3 }}</td>
                    <td>{{ $respondent->phone_4 }}</td>
                    <td>{{ $respondent->region }}</td>
                    <td>{{ $respondent->county }}</td>
                    <td>{{ $respondent->sub_county }}</td>
                    <td>{{ $respondent->district }}</td>
                    <td>{{ $respondent->division }}</td>
                    <td>{{ $respondent->location }}</td>
                    <td>{{ $respondent->sub_location }}</td>
                    <td>{{ $respondent->ward }}</td>
                    <td>{{ $respondent->constituency }}</td>
                    <td>{{ $respondent->gender }}</td>
                    <td>{{ $respondent->exact_age }}</td>
                    <td>
                      @if($respondent->age_group)
                       {{ $respondent->age_group }}
                      @else
                       Unspecified
                      @endif
                    </td>
                    <td>{{ $respondent->setting }}</td>
                    <td>
                      {{ $respondent->education_level }}
                    </td>
                    <td>{{ $respondent->marital_status }}</td>
                    <td>{{ $respondent->religion }}</td>
                    <td>{{ $respondent->ethnic_group }}</td>
                    <td>{{ $respondent->employment_status }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection