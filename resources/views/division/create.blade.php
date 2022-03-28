@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Add A New Division</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('division.store') }}">
                    @include('division.partials.form', ['create' => true])
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection