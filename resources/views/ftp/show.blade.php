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
                <h3>{{ $ftp->file_name }}</h3>
                <hr>
                <p>
                  {{ $ftp->file_description }}
                </p>
              </div>
              <div class="col">
                <button class="btn btn-info">
                  Download {{ $ftp->file_name }}
                  <i class="fas fa-download"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endSection