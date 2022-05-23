@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit Folder Name</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ url('ftp/folders/update', $folder->id) }}">
                    @method('patch')
                    @include('ftp.folders.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection