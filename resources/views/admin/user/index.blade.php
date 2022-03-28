@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-warning">
            <div class="col-12">
              <h1 class="card-title float-left">System Users</h1>
              <a href="{{ route('admin.users.create') }}" class="btn btn-success float-right" role="button">Add New User</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach($users as $user)
                  <tr>
                    <td>
                      <a href="{{ route('admin.users.show', $user->id) }}">
                        {{ $user->name }}
                      </a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                       @foreach($user->roles as $role)
                          {{ $role->name }},
                       @endforeach
                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id) }}" role="button" title="Edit {{ $user->name }}'s information">
                        <span class="fas fa-pen"></span>
                      </a>
                      </div>
                      <div class="col">
                        <form method="post" action="{{ route('admin.users.destroy', $user->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" title="Remove {{ $user->name }} from the system">
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
              {{ $users->links() }}
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection