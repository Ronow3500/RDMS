@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This District</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('district.update', $district->id) }}">
                    @method('patch')
                    @include('district.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection