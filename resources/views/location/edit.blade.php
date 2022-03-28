@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This Location</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('location.update', $location->id) }}">
                    @method('patch')
                    @include('location.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection