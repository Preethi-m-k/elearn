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

    <!-- /.content-header -->
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
      </div><!-- /.container-fluid -->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                <!-- Default box -->
                <!-- /.card -->
                <div class="card mt-4">
                    
                    <div class="card-body">
                        <h2>Student information</h2>
                        <table class="table">
                            <tr>
                                <td>Name : </td>
                                <td>{{ $student_info->first_name}}</td>
                            </tr>
                            <tr>
                                <td>E-mail : </td>
                                <td>{{ $student_info->email}}</td>
                            </tr>                          
                        
                        </table>
                        <h2>Result info</h2>
                        <table class="table">
                            <tr>
                                <td>Correst ans : </td>
                                <td>{{ $result_info->yes_ans}}</td>
                            </tr>
                            <tr>
                                <td>Wrong ans : </td>
                                <td>{{ $result_info->no_ans}}</td>
                            </tr>
                            <tr>
                                <td>Total : </td>
                                <td>{{ $result_info->yes_ans+$result_info->no_ans}}</td>
                            </tr>
                        </table>
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
