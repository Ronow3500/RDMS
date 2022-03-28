@extends('layouts/main')

@section('content')
 
 <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-primary">
            <h2 class="card-title text-light">
              Location Details
            </h2>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Location Name</th>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $location->name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <hr>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endSection