
@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
  <h1 class="page-title">Add Assignment for <?= $course_name ?></h1>
</div>

<div class="page-content">

<div class="panel">
  <div class="panel-body">
    <form method="POST" action="{{ route('instructor.course.saveassignment') }}" id="assignmentForm">
      {{ csrf_field() }}
      <input type="hidden" name="course_id" value="{{ $course_id }}">
      <div class="row">
      
        <div class="form-group col-md-4">
          <label class="form-control-label">Assignment </label>
          <input type="text" class="form-control" name="assignment" value="<?= $assignment ?>"
            placeholder="Assignment" required />
        </div>
      </div>
      <hr>
      <div class="form-group row">
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

       
      <!-- End Panel Basic -->
</div>

@endsection