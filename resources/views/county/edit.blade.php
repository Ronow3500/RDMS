@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This County</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('county.update', $county->id) }}">
                    @method('patch')
                    @include('county.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection