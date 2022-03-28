@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This Age Group</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('age_group.update', $age_group->id) }}">
                    @method('patch')
                    @include('age_group.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection