@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This Ethnic Group</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('ethnic_group.update', $ethnic_group->id) }}">
                    @method('patch')
                    @include('ethnic_group.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection