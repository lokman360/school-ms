@extends("admin.layout.layout")
@section("body")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>

                </small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <div class="box box-top-border box-padding box-padding-bottom">
                        <div class="row">
                            <div class="box-header-title">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="box-title-center">
                                        <h3 class="text-center"><i class="fa fa-user-circle"></i> View All Students</h3>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="main-content-body">
                              <div class="col-md-12">
                                <a href="{{URL::to('download/seatplan')}}" class="btn btn-theme-color"><i class="fa fa-arrow-left"></i> Back</a>
                              </div>
                              <div class="col-md-12">
                                <div class="user-request-show">
                                  <h3>Exam : {{$request->st_exam}}, Class : {{$request->st_class}} , @isset($request->st_section) Section : {{$request->st_section}} , @endisset Session : {{$request->st_session}}</h3>
                                </div>
                              </div>
                              @if($exam->exam_session == $request->st_session)
                                <div class="col-md-12">
                                    @if(count($students) > 0)
                                      @foreach($students as $student)      
                                        <div class="col-md-4">
                                            <div class="single-seatplan-view">
                                              <h3>Rangpur High School, Rangpur</h3>
                                              <h4>{{$exam->exam_name}}-{{$exam->exam_session}}</h4>
                                                <table class="table-responsive">
                                                  <tbody>
                                                    <tr>
                                                      <td rowspan="5">
                                                        <div class="seatplan-st-img-area">
                                                          @if($student->st_photo)
                                                            <img src="{{asset('upload/'.$student->st_photo)}}" alt="">
                                                          @else
                                                            <img src="{{asset('dist/img/user.png')}}" alt="">
                                                          @endif
                                                        </div>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name : {{$student->st_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Class : @isset($student->st_class) {{$student->stClass->class_name}} @endisset</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Section : @isset($student->st_section) {{$student->section->section_name}} @endisset</td>
                                                        <td rowspan="2"><div class="seatplan-rollbox">{{$student->st_roll_no}}</div></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Session : {{$student->st_session}}</td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                            </div>
                                        </div>
                                      @endforeach
                                  @else
                                    <h2 class="data-available-msg">Student No Found</h2>
                                  @endif
                                </div>
                              @else
                              <div class="col-md-12">
                                <h2 class="data-available-msg">Exam Not Avaiable In This Session</h2>
                              </div>
                              @endif
                            </div>
                        </div>  
                    </div>
                </section>
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

