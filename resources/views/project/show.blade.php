@extends('layouts/main')

@section('content')
 
 <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-primary">
            <h2 class="card-title text-light">
              Project Details
            </h2>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Project Name</th>
                  <th>Created By</th>
                  <th>Updated By</th>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->created_by }}</td>
                    <td>{{ $project->updated_by }}</td>
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