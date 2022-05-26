@extends('layouts/main')

@section('content')
 
 <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-primary">
            <h2 class="card-title text-light">
              <h3>
                <i class="fas fa-folder fa-lg"></i>
                {{ $folder->folder_name }}
              </h3>
            </h2>
          </div>
          <div class="card-body">
            @isset($files)
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Files</th>
                    <th>File Type & Size</th>
                    <th>Download</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach($files as $file)
                  <tr>
<?php
 $slug = Str::slug($file->file_title, '-');
?>
                    <td>
                      <a href="{{ url('ftp/files/show', $file->id) }}">
                        <i class="fas fa-file"></i>
                        {!! $file->file_title !!}
                      </a>
                    </td>
                    <td>
                      {{ $file->file_type . ' - ' . $file->file_size . 'kb' }}
                    </td>
                    <td>
                      <a href="<?= url('ftp/files/download', $file->id) ?>">
                        <i class="fas fa-download"></i>
                      </a>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                        <a onclick="return false;" class="btn btn-sm btn-primary" href="{{ url('ftp/files/edit', $file->id) }}" role="button" title="Edit {{ $file->file_title }}">
                        <span class="fas fa-pen"></span>
                      </a>
                      </div>
                      <div class="col">
                        <!-- Prompt Delete Modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#{{ $slug }}" title="Remove {{ $file->file_title }} from the system">
                          <span class="far fa-trash-alt"></span>
                        </button>

                        <!-- Delete Modal -->
                          <div class="modal" id="{{ $slug }}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-danger">You are about to delete {{ $file->file_title }}. Are you sure ?</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal" title="Do Not Delete">No</button>
                                    </div>
                                    <div class="col">
                                      <form method="post" action="{{ url('ftp/files/destroy', $file->id) }}">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-danger float-right" title="Remove {{ $file->file_title }} from the system">
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
          <div class="card-footer">
            {{ $files->links() }}
          </div>
        </div>
        <hr>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endSection