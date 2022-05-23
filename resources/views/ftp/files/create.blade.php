@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Upload File</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ url('ftp/store') }}" enctype="multipart/form-data">
                    @include('ftp.partials.form', ['create' => true])
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection