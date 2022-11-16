@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Quize User Details</li>
  </ol>
  <h1 class="page-title">Quize Exam User Details</h1>
</div>

<div class="page-content">

<div class="panel">
        <div class="panel-heading">
            <!-- <div class="panel-title">
              <a href="{{ route('instructor.course.info') }}" class="btn btn-success btn-sm"><i class="icon wb-plus" aria-hidden="true"></i> Add Course</a>
            </div> -->
          
          <!-- <div class="panel-actions">
          <form method="GET" action="{{ route('instructor.course.list') }}">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ Request::input('search') }}">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-original-title="Search"><i class="icon wb-search" aria-hidden="true"></i></button>
                  <a href="{{ route('instructor.course.list') }}" class="btn btn-danger" data-toggle="tooltip" data-original-title="Clear Search"><i class="icon wb-close" aria-hidden="true"></i></a>
                </span>
              </div>
          </form>
          </div> -->
        </div>
        
        <div class="panel-body">
          <table class="table table-hover table-striped w-full">
            <thead>
              <tr>
                <th>Sl.no</th>
                <th>Student Name</th>
                <th>Exam id</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($student as $stu)
              <tr>
                <td>{{ $stu->id }}</td>
                <td>{{ $stu->first_name }}</td>
                <td>{{ $stu->exam_id }}</td>
                
                <td>
                  @if($stu->std_status)
                  <span class="badge badge-success">Active</span>
                  @else
                  <span class="badge badge-danger">Inactive</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('quize.admin_view_answer', $stu->user_id) }}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit" >
                    <i class="icon wb-pencil" aria-hidden="true"></i>
                  </a>
</td>
                
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