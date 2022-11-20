@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Courses</li>
  </ol>
  <h1 class="page-title">Courses</h1>
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
                <th>Username</th>
                <th>Email</th>
                <th>Course</th>
                <th>Rating</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($list as $course)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $course->loadUser->first_name." ".$course->loadUser->last_name }}</td>
                <td>{{ $course->loadUser->email }}</td>
                <td>{{ $course->loadCourse->course_slug }}</td>
                <td>{{ $course->rating }}</td>
                <td>{{ $course->status ? 'Completed' : '' }}</td>
               
                <td>
                  <a href="{{ route('instructor.course.rating.edit', $course->id) }}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit" >
                    <i class="icon wb-pencil" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
              <?php $i++; ?>
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