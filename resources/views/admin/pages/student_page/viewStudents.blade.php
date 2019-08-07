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
                                   <ul class="nav nav-tabs">
                                      <li class="active"><a data-toggle="tab" href="#home">View Class Wise Student</a></li>
                                      <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                                      <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                                    </ul>

                                    <div class="tab-content">
                                      <div id="home" class="tab-pane fade in active">
                                        <br>
                                        <div class="col-md-4 col-md-offset-4">
                                          {{Form::open(['url'=>URL::to('students/view')])}}
                                            <div class="form-group">
                                              {{Form::select('st_class',[''=>'Select Class','1'=>'One','2'=>'Two','3'=>'Three','4'=>'Four','5'=>'Five','6'=>'Six'],old('st_class'),['class'=>'form-control','required'=>'required'])}}
                                            </div>
                                            <div class="form-group">
                                              {{Form::select('st_section',[''=>'Select Section','1'=>'A','2'=>'B','3'=>'C'],old('st_class'),['class'=>'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                              {{Form::select('st_session',[''=>'Select Session','2018'=>'2018','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023'],old('st_class'),['class'=>'form-control','required'=>'required'])}}
                                            </div>
                                            <div class="form-group">
                                              {{Form::submit('submit',['class'=>'form-control btn-theme-color'])}}
                                            </div>
                                          {{Form::close()}}  
                                        </div>
                                      </div>
                                      <div id="menu1" class="tab-pane fade">
                                        <h3>Menu 1</h3>
                                        <p>Some content in menu 1.</p>
                                      </div>
                                      <div id="menu2" class="tab-pane fade">
                                        <h3>Menu 2</h3>
                                        <p>Some content in menu 2.</p>
                                      </div>
                                    </div>
                                </div>
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