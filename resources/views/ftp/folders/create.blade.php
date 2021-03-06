@extends('layouts/main')

@section('content')
 <div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Create Folder</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="{{ url('ftp/folders/store ') }}" method="POST">
                    @include('ftp.folders.partials.form', ['create' => true])
                </form>
            </div>
        </div>
    </div>
 </div>

@endSection