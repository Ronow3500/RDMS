@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-warning">
            <div class="row">
              <div class="col-6">
                <h1 class="card-title float-left">
                  :<span class="badge badge-success">Gender Options</span>
                </h1>

              </div>
              <div class="col-6">
                <a href="{{ route('gender.create') }}" class="btn btn-success float-right" role="button">Add New Gender Option</a>
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
                  @foreach($gender as $item)
                  <tr>
                    <td>
                      <a href="{{ route('gender.show', $item->id) }}">
                        {{ $item->option }}
                      </a>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                        <a class="btn btn-sm btn-primary" href="{{ route('gender.edit', $item->id) }}" role="button" title="Edit {{ $item->option }} option">
                        <span class="fas fa-pen"></span>
                      </a>
                      </div>
                      <div class="col">
                        <form method="post" action="{{ route('gender.destroy', $item->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" title="Remove {{ $item->option }} option from the system">
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
              {{ $gender->links() }}
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection