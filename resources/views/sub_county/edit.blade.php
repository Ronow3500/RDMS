@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h3 class="text-center">Edit This Sub County</h3>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('sub_county.update', $sub_county->id) }}">
                    @method('patch')
                    @include('sub_county.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection