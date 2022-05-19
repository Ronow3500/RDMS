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
                <hr>
                <p>
                  {{ $file->file_description }}
                </p>
              </div>
              <div class="col">
                <?php

use Illuminate\Support\Facades\Storage;

$url = Storage::url(public_path('storage/'.$file->file_name));
                ?>
                <a href="<?= $url; ?>" class="btn btn-info" title="Download">
                   {{ $file->file_name }}
                  <i class="fas fa-download"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endSection