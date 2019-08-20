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
                                        <h3 class="text-center"><i class="fa fa-user-circle"></i> View Admit Card</h3>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="main-content-body">
                              <div class="col-md-12">
                                <a href="{{URL::to('download/admitcard')}}" class="btn btn-theme-color"><i class="fa fa-arrow-left"></i> Back</a>
                              </div>
                              <div class="col-md-12">
                                <div class="user-request-show">
                                  {{-- <h3>Exam : {{$request->st_exam}}, Class : {{$request->st_class}} , @isset($request->st_section) Section : {{$request->st_section}} , @endisset Session : {{$request->st_session}}</h3> --}}
                                </div>
                              </div>
                              @if($exam->exam_session == $request->st_session)
                                <div class="col-md-12">
                                    @if(count($students) > 0)
                                      @foreach($students as $student)      
                                        <div class="col-md-12">
                                            <div class="single-admitcard-view">
                                               <div class="admitcard-st-img-area">
                                                  @if($student->st_photo)
                                                    <img class="" src="{{asset('upload/'.$student->st_photo)}}" alt="">
                                                  @else
                                                    <img class="" src="{{asset('dist/img/user.png')}}" alt="">
                                                  @endif
                                                </div>
                                                <div class="admit-header-area text-center">
                                                  <h2>Rangpur High School, Rangpur</h2>
                                                  <h3>{{$exam->exam_name}}-{{$exam->exam_session}}</h3>

                                                  <h3 class="admit-text">Admit Card</h3>
                                                </div>
                                                <div class="admit-roll-area">
                                                  Roll No. {{$student->st_roll_no}}
                                                </div>
                                                <table class="table-responsive table margin-non">
                                                  <thead>
                                                    <tr>
                                                      <td><b>Name of the Examinee : </b><span class="underline_dot">{{$student->st_name}}</span> </td>                                  
                                                      <td><b>Class :</b> <span class="underline_dot"> @isset($student->st_class) {{$student->stClass->class_name}} @endisset</span></td>
                                                      <td><b>Section :</b> <span class="underline_dot"> @isset($student->st_section) {{$student->section->section_name}} @endisset</span></td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2"><b>Father's Name : </b> <span class="underline_dot">{{$student->st_f_name}}</span> </td>                                  
                                                      <td><b>Exam Session :</b> <span class="underline_dot">{{$exam->exam_session}}</span></td>
                                                    </tr>
                                                    <tr><td></td></tr>
                                                  </thead>
                                                </table>
                                                <div class="admit-subject-area">
                                                  <span><b>Subject Name:</b></span><br>
                                                  <span class="admit-subject-item">
                                                    @php
                                                      if(count($subjects) > 0){
                                                        echo "[ ";
                                                      }
                                                        $data = array();
                                                        foreach($subjects as $subject){
                                                          $data[] = $subject->subject_name;
                                                        }
                                                        echo implode(', ',$data);
                                                      if(count($subjects) > 0){
                                                        echo " ]";
                                                      }
                                                    @endphp
                                                    
                                                  </span>
                                                </div>
                                                <div class="admit-sign-area">
                                                  <img src="{{asset('dist/img/signature.png')}}" alt="sign"><br>
                                                  <span>Principal Of</span><br>
                                                  (Rangpur High School)
                                                </div>
                                                <div class="admit-footer-area">
                                                  <p><strong>Direction : </strong><br>&nbsp;&nbsp;&nbsp;&nbsp; 1. The examiniee must bring the Registration Card abong with the Admit Card in the examination hall.</p>
                                                  <p>&nbsp;&nbsp;&nbsp;&nbsp; 2. The examineemust sing in the attendace sheet for each subject in the examination hall otherwise examinee will be treated as absent in the respective subj.</p>
                                                </div>
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

