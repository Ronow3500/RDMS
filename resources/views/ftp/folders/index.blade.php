@extends('layouts.main')

@section('content')

 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-warning">
            <div class="row">
              <div class="col-6">
                <h1 class="card-title float-left"> Folder </h1>
              </div>
              <div class="col-6">
                <a href="{{ url('ftp/folders/create') }}" class="btn btn-success float-right" role="button">Create Folder</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            @isset($folders)
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Folder</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach($folders as $folder)
                  <tr>
<?php
 $slug = Str::slug($folder->folder_name, '-');
?>
                    <td>
                      <a href="{{ url('ftp/folders/show', $folder->id) }}">
                        <h1>
                          <i class="fas fa-folder"></i>
                          {!! $folder->folder_name !!}
                        </h1>
                      </a>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                        <a class="btn btn-sm btn-primary" href="{{ url('ftp/folders/edit', $folder->id) }}" role="button" title="Edit {{ $folder->folder_name }}">
                        <span class="fas fa-pen"></span>
                      </a>
                      </div>
                      <div class="col">
                        <!-- Prompt Delete Modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#{{ $slug }}" title="Remove {{ $folder->folder_name }} from the system">
                          <span class="far fa-trash-alt"></span>
                        </button>

                        <!-- Delete Modal -->
                          <div class="modal" id="{{ $slug }}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-danger">You are about to delete {{ $folder->folder_name }}. Are you sure of this action?</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal" title="Do Not Delete">No</button>
                                    </div>
                                    <div class="col">
                                      <form method="post" action="{{ url('ftp/folders/destroy', $folder->id) }}">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-danger float-right" title="Remove {{ $folder->folder_name }} from the system">
                                        Yes
                                      </button>
                                      </form>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Delete Modal -->
                        
                      </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endisset
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection