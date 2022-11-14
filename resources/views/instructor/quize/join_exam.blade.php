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
        
        
        <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                
                <div class="card-body">
                   <div class="row">
                       <div class="col-sm-4">
                          <h3 class="text-center">Time : {{ $exam->exam_duration}} min</h3>
                       </div>
                       <div class="col-sm-4">
                           <h3><b>Timer</b> :  <span class="js-timeout" id="timer">{{ $exam['exam_duration']}}:00</span></h3>
                       </div>
                       
                        <div class="col-sm-4">
                            <h3 class="text-right"><b>Status</b> :Running</h3>
                        </div>
                   </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card mt-4">
                
                <div class="card-body">

                  <form action="/submit_questions" method="POST">
                    <input type="hidden" name="course_id" value="{{ Request::segment(2)}}">
                    <input type ="hidden" name="user_id" value="{{Auth::id()}}">
                    {{ csrf_field()}}
                   <div class="row">

                        @foreach ($question as $key=>$q)
                            <div class="col-sm-12 mt-4">
                              <p>{{$key+1}}. {{ $q->questions}}</p>
                              <?php 
                                    $options = json_decode(json_decode(json_encode($q->options)),true);
                              ?>
                              <input type="hidden" name="question{{$key+1}}" value="{{$q['id']}}">
                              <ul class="question_options">
                                  <li><input type="radio" value="{{ $options['option1']}}" name="ans{{$key+1}}"> {{ $options['option1']}}</li>
                                  <li><input type="radio" value="{{ $options['option2']}}" name="ans{{$key+1}}"> {{ $options['option2']}}</li>
                                  <li><input type="radio" value="{{ $options['option3']}}" name="ans{{$key+1}}"> {{ $options['option3']}}</li>
                                  <li><input type="radio" value="{{ $options['option4']}}" name="ans{{$key+1}}"> {{ $options['option4']}}</li>

                                  <li style="display: none;"><input value="0" type="radio" checked="checked" name="ans{{$key+1}}"> {{ $options['option4']}}</li>
                              </ul>
                            </div>
                        @endforeach
                        
                        

                          <div class="col-sm-12">
                            <input type="hidden" name="index" value="{{ $key+1}}">
                              <button type="submit" class="btn btn-primary" id="myCheck">Submit</button>
                          </div>
                   </div>
                  </form>
                  
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      </section>

      @endsection