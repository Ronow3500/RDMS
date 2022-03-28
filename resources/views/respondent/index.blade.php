@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-warning">
            <div class="row">
              <div class="col-9">
                <div class="row">
                  <div class="col">
                    @can('is-manager')
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        
                        <a href="{{ route('export-excel') }}" title="Download Excel File" class="btn btn-secondary">
                          <span class="fas fa-download"></span>
                          Excel
                        </a>
                        <a href="{{ route('export-csv') }}" title="Download CSV File" class="btn btn-secondary">
                          <span class="fas fa-download"></span>
                          CSV
                        </a>
                    </div>
                    @endcan
                  </div>
                  <div class="col">
                    <a href="{{ route('import_form') }}" class="btn btn-primary float-right" role="button" title="Import from excel or csv file">
                      <span class="fas fa-upload"></span>
                      Import
                    </a>
                  </div>
                  <div class="col">
                    <a href="{{ route('respondents.create') }}" class="btn btn-success float-right" role="button">Add New Respondent</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h4> Respondents Database</h4>
                  </div>
                  <div class="col">
                    <a href="{{ route('respondents.filter') }}" class="btn btn-success">
                      <i class="fas fa-search"></i>
                      Filter Before Download
                    </a>
                  </div>
                </div>
                <hr class="bg-warning">
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Name</th>
                    <th>County</th>
                    <th>Phone 1</th>
                    <th>Age Group</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach($respondents as $respondent)
                  <tr>
                    <td>
                      <a href="{{ route('respondents.show', $respondent->id) }}">
                        {{ $respondent->name }}
                      </a>
                    </td>
                    <td>{{ $respondent->county }}</td>
                    <td>{{ $respondent->phone_1 }}</td>
                    <td>
                      @if($respondent->age_group)
                       {{ $respondent->age_group }}
                      @else
                       Unspecified
                      @endif
                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                        <a class="btn btn-sm btn-primary" href="{{ route('respondents.edit', $respondent->id) }}" role="button" title="Edit {{ $respondent->name }}'s information">
                        <span class="fas fa-pen"></span>
                      </a>
                      </div>
                      <div class="col">
                        <form method="post" action="{{ route('respondents.destroy', $respondent->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" title="Remove {{ $respondent->name }} from the database">
                          <span class="far fa-trash-alt"></span>
                        </button>
                        </form>
                      </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $respondents->links() }}
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection