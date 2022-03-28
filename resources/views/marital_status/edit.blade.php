@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This Marital Status</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('marital_status.update', $marital_status->id) }}">
                    @method('patch')
                    @include('marital_status.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection