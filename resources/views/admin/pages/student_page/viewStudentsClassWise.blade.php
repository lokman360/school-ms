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
                    <div class="box box-top-border box-padding">
                        <div class="row">
                            <div class="box-header-title">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="box-title-center">
                                         @if($errors->any())
                                           <div class="error-messages-area">
                                              @foreach($errors->all() as $error)
                                                <i class="fa fa-exclamation-triangle"></i> {{$error}} @break
                                              @endforeach
                                            </div>
                                          @endif
                                          @if(session()->has('successMsg'))
                                            <div class="success-messages-area">
                                              {{session()->get('successMsg')}}
                                            </div>
                                          @elseif(session()->has('errorMsg'))
                                            <div class="error-messages-area">
                                              {{session()->get('errorMsg')}}
                                            </div>
                                          @endif
                                        <h3 class="text-center"><i class="fa fa-user-circle"></i> Create New Students</h3>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="main-content-body">
                               <div class="col-md-12">
                                 <a href="{{URL::to('students/view')}}" class="btn btn-style btn-theme-color btn-md"><i class="fa fa-arrow-left"></i> Back</a>
                               </div>
                                <div class="col-md-12">
                                     <table class="table table-responsive table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>NAME</th>
                                                <th>FATHER'S NAME</th>
                                                <th>ROLL</th>
                                                <th>CLASS</th>
                                                <th>SECTION</th>
                                                <th>SESSION</th>
                                                <th>PHONE</th>
                                                <th class="col-md-2">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($allStudents)
                                            @foreach($allStudents as $allStudent)
                                              <tr>
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$allStudent->st_name}}</td>
                                                  <td>{{$allStudent->st_f_name}}</td>
                                                  <td>{{$allStudent->st_roll_no}}</td>
                                                  <td>{{$allStudent->st_class}}</td>
                                                  <td>{{$allStudent->st_section}}</td>
                                                  <td>{{$allStudent->st_session}}</td>
                                                  <td>{{$allStudent->st_phone}}</td>
                                                  <td><button class="btn btn-xs btn-info" data-toggle="modal" data-target="{{'#single-view'.$allStudent->id}}"><i class="fa fa-eye"></i></button> | <a class="btn btn-xs btn-info" href="{{URL::to('students/view/'.$allStudent->id.'/edit')}}"><i class="fa fa-edit"></i></a> | 
                                                    {{Form::open(['url'=>URL::to('student',$allStudent->id),'class'=>'delete-form'])}}
                                                      {{method_field('DELETE')}}
                                                      <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                                    {{Form::close()}}                   
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="{{'single-view'.$allStudent->id}}" role="dialog">
                                                      <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-user-plus"></i> Create New Student</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                  <div class="st-signle-view-area">
                                                                    <h2 class="text-center">Rangpur High School And College, Rangpur</h2>
                                                                    <h4 class="text-center"><i>Email: rangpurhs@gmail.comi, &nbsp; www.rhs.gov.bd</i></h4>
                                                                    <p class="text-center"><i>Phone: 01797715122, 01710460186</i></p>
                                                                    <br>
                                                                    <div class="col-md-3">
                                                                      <div class="st-single-view-photo">
                                                                          @if($allStudent->st_photo)
                                                                            <img src="{{asset('upload/'.$allStudent->st_photo)}}" class="img img-responsive img-thumbnail" alt="">
                                                                            
                                                                          @else
                                                                            <img src="{{asset('dist/img/user.png')}}" class="img img-responsive img-thumbnail" alt="">
                                                                          @endif
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                      <div class="st-single-view-bio">
                                                                          <table class="table table-responsive st-bio-top-table">
                                                                            <thead>
                                                                              <tr>
                                                                                <td>Name : </td>
                                                                                <td>{{$allStudent->st_name}}</td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td>Class : </td>
                                                                                <td>{{$allStudent->st_class}}</td>
                                                                                <td>Section :</td>
                                                                                <td>{{$allStudent->st_section}}</td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td>Roll No : </td>
                                                                                <td>{{$allStudent->st_roll_no}}</td>
                                                                                <td>Religion :</td>
                                                                                <td>{{$allStudent->st_religion}}</td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td>Session: </td>
                                                                                <td>{{$allStudent->st_session}}</td>
                                                                                <td>Blood Group :</td>
                                                                                <td>{{$allStudent->st_blood_group}}</td>
                                                                              </tr>
                                                                            </thead>
                                                                          </table>
                                                                      </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-md-12">
                                                                      <h3 class="text-center"><i>Other informations</i></h3>
                                                                      <table class="table table-responsive table-bordered ">
                                                                        <tbody>
                                                                          <tr>
                                                                            <td>Name : </td>
                                                                            <td>{{$allStudent->st_name}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Father's Name : </td>
                                                                            <td>{{$allStudent->st_f_name}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Mother's Name : </td>
                                                                            <td>{{$allStudent->st_m_name}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Phone Number : </td>
                                                                            <td>{{$allStudent->st_phone}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Email : </td>
                                                                            <td>{{$allStudent->st_email}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Present Address : </td>
                                                                            <td>{{$allStudent->st_present_add}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Permanent Address : </td>
                                                                            <td>{{$allStudent->st_permanent_add}}</td>
                                                                          </tr>
                                                                        </tbody>
                                                                      </table>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-md-12">
                                                                      <table class="table table-responsive table-bordered ">
                                                                          <tbody class="text-center">
                                                                            <td><h4><i>Email: rangpurhs@gmail.comi, &nbsp; www.rhs.gov.bd, &nbsp; Phone: 01797715122, 01710460186</i></h4></td>
                                                                          </tbody>
                                                                      </table>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                          </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </td>
                                              </tr>
                                            @endforeach
                                          @endif
                                        </tbody>
                                    </table>
                                </div>
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