@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-warning">
            <div class="row">
              <div class="col-6">
                <h1 class="card-title float-left"> Ethnic Groups </h1>
              </div>
              <div class="col-6">
                <a href="{{ route('ethnic_group.create') }}" class="btn btn-success float-right" role="button">Add A New Ethnic Group</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach($ethnic_group as $item)
                  <tr>
                    <td>
                      <a href="{{ route('ethnic_group.show', $item->id) }}">
                        {{ $item->name }}
                      </a>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                        <a class="btn btn-sm btn-primary" href="{{ route('ethnic_group.edit', $item->id) }}" role="button" title="Edit {{ $item->name }} ethnic_group">
                        <span class="fas fa-pen"></span>
                      </a>
                      </div>
                      <div class="col">
                        <form method="post" action="{{ route('ethnic_group.destroy', $item->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" title="Remove {{ $item->name }} from the system">
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
              {{ $ethnic_group->links() }}
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection