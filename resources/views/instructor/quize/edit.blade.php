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
        <form action="/edit_question_inner/{{$q->id}}" method="POST" class="database_operation">  
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Enter Question</label>
                                    {{ csrf_field()}}
                                    <input type="hidden" name="id" value="{{ $q->id}}">
                                    <input type="text" value="{{ $q->questions}}" required="required" name="question" placeholder="Enter Question" class="form-control">
                                </div>
                            </div>
                            <?php
                                $options = json_decode($q->options);
                            ?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Enter Option 1</label>
                                    <input type="text" value="{{ $options->option1}}" required="required" name="option_1" placeholder="Enter Question" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Enter Option 2</label>
                                    <input type="text" value="{{ $options->option2}}" required="required" name="option_2" placeholder="Enter Option 2" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Enter Option 3</label>
                                    <input type="text" value="{{$options->option3}}" required="required" name="option_3" placeholder="Enter  Option 3" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Enter Option 4</label>
                                    <input type="text" value="{{ $options->option4}}" required="required" name="option_4" placeholder="Enter  Option 4" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="">Select correct option</label>
                              <select class="form-control" required="required" name="ans">
                                  <option value="{{$q->ans}}">{{$q->ans}}</option>
                                
                                  <option value="option_1">option 1</option>
                                  <option value="option_2">option 2</option>
                                  <option value="option_3">option 3</option>
                                  <option value="option_4">option 4</option>
                  
                              </select>
                          </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>  
          
         
          
          
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