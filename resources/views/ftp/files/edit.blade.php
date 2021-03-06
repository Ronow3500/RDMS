@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit File Details</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ url('ftp/files/update', $file->id) }}">
                    @method('patch')
                    @include('ftp.files.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection