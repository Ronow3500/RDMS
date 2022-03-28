@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This Gender</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('gender.update', $gender->id) }}">
                    @method('patch')
                    @include('gender.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection