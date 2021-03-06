@extends('layouts/main')

@section('content')
 
 <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-primary">
            <h2 class="card-title text-light">
              File Details
            </h2>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h3>{{ $file->file_title }}</h3>
                
                <ul class="list-group">
                  <li class="list-group-item list-group-item-success"><strong>File Name: </strong> {{ $file->file_name }}</li>
                  <li class="list-group-item list-group-item-info"><strong>File Type: </strong> {{ $file->file_type }}</li>
                  <li class="list-group-item list-group-item-warning"><strong>File Size: </strong> {{ $file->file_size }} Kilobytes</li>
                </ul>
                <hr>
                <p>{{ $file->file_description }}</p>
              </div>
              <div class="col">
                <a href="<?= url('ftp/files/download', $file->id) ?>" class="btn btn-primary float-right" title="Download {{ $file->file_name }}">
                   Download
                  <i class="fas fa-download"></i>
                </a>
                <p>{{ $file->file_description }}</p>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endSection