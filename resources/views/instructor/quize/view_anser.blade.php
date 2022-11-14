@extends('layouts.backend.index')
@section('content')
<style type="text/css">
    .question_options>li{
        list-style: none;
        height: 40px;
        line-height: 40px;
    }
</style>
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Quize</li>
  </ol>
  <h1 class="page-title">Quize</h1>
</div>

    <!-- /.content-header -->
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                
                <div class="card-body">
                   
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card mt-4">
                
                <div class="card-body">

                  <form action="#" class="container">
                    
                   <div class="row container">

                        @foreach ($question as $key=>$q)
                            <div class="col-sm-12 mt-4">
                              <p>{{$key+1}}. {{ $q['questions']}}</p>
                              <?php 
                                    $options = json_decode(json_decode(json_encode($q['options'])),true);
                              ?>
                              <input type="hidden" name="question{{$key+1}}" value="{{$q['id']}}">
                              <ul class="question_options">
                                  <li><input type="radio" <?php if($options['option1']==$q['ans']){echo 'checked';} else{echo 'disabled';}?> >  {{ $options['option1']}}</li>
                                  <li><input type="radio" <?php if($options['option2']==$q['ans']){echo 'checked';} else{echo 'disabled';}?> >  {{ $options['option2']}}</li>
                                  <li><input type="radio" <?php if($options['option3']==$q['ans']){echo 'checked';} else{echo 'disabled';}?> >  {{ $options['option3']}}</li>
                                  <li><input type="radio" <?php if($options['option4']==$q['ans']){echo 'checked';} else{echo 'disabled';}?> >  {{ $options['option4']}}</li>

                                  
                              </ul>
                            </div>
                        @endforeach
                        
                   </div>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-header -->

    <!-- Modal -->


 
@endsection
