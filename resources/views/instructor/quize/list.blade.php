@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Quize</li>
  </ol>
  <h1 class="page-title">Quize</h1>
</div>

<div class="page-content">

<div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
             
            </div>
          
         
        </div>
        
        <div class="panel-body">
          <table class="table table-hover table-striped w-full">
            <thead>
              <tr>
                <th>Sl.no</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Category</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($quize as $course)
              <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->exam_id }}</td>
                <td>{{ $course->questions }}</td>
                <td>{{ $course->status }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
         
          
          
        </div>
      </div>
      <!-- End Panel Basic -->
</div>

@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function()
    { 

    });
</script>
@endsection