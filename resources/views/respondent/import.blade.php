@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col">
                     <h5 class="text-center">Importing Respondents From A Spreadsheet File i.e Excel or CSV</h5>
                 </div>
                 <div class="col">
                     <a href="{{ url('/Samples/Template.xlsx') }}" class="btn btn-primary">
                         <i class="fas fa-download"></i>
                         Sample Spreadsheet file 
                     </a>
                 </div>
             </div>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('respondents.import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col">
                        <div class="mb-3">
                           <div class="form-group">
                              <label for="file">Select File To Import From</label>
                              <input id="file" type="file" name="file" class="form-control" aria-describedby="file">
                           </div>
                           @if(session('errors'))
                             <ul class="text-danger">
                              @foreach($errors as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                             </ul>
                           @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Import</button>
                        </div>
                      </div>
                      <div class="col">
                          
                      </div>
                  </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection