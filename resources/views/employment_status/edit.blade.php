@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This Employment Status</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('employment_status.update', $employment_status->id) }}">
                    @method('patch')
                    @include('employment_status.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection