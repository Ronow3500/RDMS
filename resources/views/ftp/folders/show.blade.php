@extends('layouts/main')

@section('content')
 
 <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-primary">
            <h2 class="card-title text-light">
              Folder Details
            </h2>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h3>{{ $file->folder_name }}</h3>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endSection