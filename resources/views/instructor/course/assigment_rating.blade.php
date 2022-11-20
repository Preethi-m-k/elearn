@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Courses</li>
  </ol>
  <h1 class="page-title">Assignment View</h1>
</div>

<div class="page-content">

  <div class="panel">
          <div class="panel-heading">
              <div class="panel-title">
              <form method="POST" action="{{ route('instructor.course.saverating') }}" id="assignmentForm">
                    {{ csrf_field() }}
                    <input type="hidden" name="assignment_id" value="{{ $list->id }}">
                <table class="table table-bordered">
                <tr><td>Course  :</td><td><?= $list->loadCourse->course_slug ?></td></tr>
                <tr><td>Student :</td><td><?= $list->loadUser->email ?></td></tr>
                <tr><td>Assignment :</td><td><?= $list->loadCourse->assignment ?></td></tr>
                <tr><td>File:</td><td><iframe src="<?= $file ?>" width="700" height="500"></iframe></td></tr>
                <tr><td>Rating</td><td><input type="number" max="5" min="0" step="1" class="form-control" name="rating" value="<?= $list->rating ?>"
                          placeholder="Assignment Rating" required /></td></tr>
                <tr><td></td><td> <button type="submit" class="btn btn-primary">Submit</button></td></tr>
                </table>
                    
                  </form>
              </div>
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