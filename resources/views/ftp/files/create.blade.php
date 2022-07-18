@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
            <div class="row">
                <div class="col">
                   <h3 class="text-center">Upload File</h3>
                </div>
                <div class="col">
                   <div class="alert alert-info">
                       <p>
                         <i class="fas fa-server"></i>
                         System can only upload file size of upto 200 Mbs.
                       </p>
                       <p>
                         <i class="fas fa-file-import"></i>
                         Split larger files into bits not exceeding 200 Mbs
                       </p>
                   </div> 
                </div>
            </div>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ url('ftp/files/store') }}" enctype="multipart/form-data">
                    @include('ftp.files.partials.form', ['create' => true])
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection