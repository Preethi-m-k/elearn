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
                <th>Exam id</th>
                <th>Question</th>
                <th>Ansewer</th>
                <th>Status</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($quize as $course)
              <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->exam_id }}</td>
                <td>{{ $course->questions }}</td>
                <td>{{ $course->ans }}</td>
                <td>
                  @if($course->status ==1)
                  <span class="badge badge-success">Active</span>
                  @else
                  <span class="badge badge-danger">Inactive</span>
                  @endif
                </td>
                <td>
                  <a href=" question_edit/{{$course->id}}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit" >
                    <i class="icon wb-pencil" aria-hidden="true"></i>
                  </a>

                  <a href="delete_question/{{$course->id }}" class="delete-record btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Delete" >
                    <i class="icon wb-trash" aria-hidden="true"></i>
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