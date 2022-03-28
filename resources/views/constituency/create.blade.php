@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Add A New Constituency</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('constituency.store') }}">
                    @include('constituency.partials.form', ['create' => true])
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection