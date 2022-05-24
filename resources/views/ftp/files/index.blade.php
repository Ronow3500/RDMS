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
                <a href="{{ url('ftp/files/create') }}" class="btn btn-success float-right" role="button">Add A New File</a>
              </div>
            </div>
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
                        <a class="btn btn-sm btn-primary" href="{{ url('ftp/files/edit', $file->id) }}" role="button" title="Edit {{ $file->file_title }}">
                        <span class="fas fa-pen"></span>
                      </a>
                      </div>
                      <div class="col">
                        <form method="post" action="{{ url('ftp/files/destroy', $file->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" title="Remove {{ $file->file_title }} from the system">
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
            </div>
            @endisset
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection