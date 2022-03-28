@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This Education Level</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('education_level.update', $education_level->id) }}">
                    @method('patch')
                    @include('education_level.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection