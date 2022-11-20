@extends('layouts.frontend.index')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/vendor/rating/rateyo.css') }}">
<!-- content start -->
<div class="container-fluid p-0 home-content">
    <!-- banner start -->
    <div class="subpage-slide-blue">
        <div class="container">
            <h1>Course</h1>
        </div>
    </div>
    <!-- banner end -->
    
    <!-- breadcrumb start -->
        <div class="breadcrumb-container">
            <div class="container">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('my.courses') }}">My Courses</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $course->course_title }}</li>
              </ol>
            </div>
        </div>
    
    <!-- breadcrumb end -->
    <div class="container">
        <div class="row mt-4">
            <form method="POST" action="{{ route('uploadAssignment') }}" id="assignmentsaveForm" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="form-control-label">Assignment : <?= $course->assignment ?> </label>
                </div>
                <div class="form-group col-12">
                    <label>File </label>
                    <input type="file" class="form-control" name="file">
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

    
@endsection