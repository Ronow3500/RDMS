@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-warning">
            <div class="row">
              <div class="col-6">
                <h1 class="card-title float-left"> Files </h1>
              </div>
              <div class="col-6">
                <a href="{{ url('ftp/create') }}" class="btn btn-success float-right" role="button">Add A New File</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Options</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach($ftp as $file)
                  <tr>
                    <td>
                      <a href="{{ url('ftp/show', $file->id) }}">
                        {{ $file->name }}
                      </a>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                        <a class="btn btn-sm btn-primary" href="{{ route('ftp.edit', $file->id) }}" role="button" title="Edit {{ $file->name }} ftp">
                        <span class="fas fa-pen"></span>
                      </a>
                      </div>
                      <div class="col">
                        <form method="post" action="{{ route('ftp.destroy', $file->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" title="Remove {{ $file->name }} from the system">
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
              {{ $ftp->links() }}
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection