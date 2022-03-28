@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This Sub Location</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('sub_location.update', $sub_location->id) }}">
                    @method('patch')
                    @include('sub_location.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection