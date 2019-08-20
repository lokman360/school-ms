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
                                        <h3 class="text-center"><i class="fa fa-user-circle"></i> Create New Students</h3>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="main-content-body">
                                <div class="col-md-12">
                                   <ul class="nav nav-tabs">
                                      <li class="active"><a data-toggle="tab" href="#home">View Class Wise Student</a></li>
                                      <li><a data-toggle="tab" href="#menu1">Search a Student</a></li>
                                      <li><a data-toggle="tab" href="#stQuickview">Quick Views</a></li>
                                    </ul>

                                    <div class="tab-content">
                                      <div id="home" class="tab-pane fade in active">
                                        <br>
                                        <div class="col-md-4 col-md-offset-4">
                                          <h3 class="text-center">Class Wise Students View</h3>
                                          {{Form::open(['url'=>URL::to('student/class-wise-view')])}}
                                            <div class="form-group">
                                              {{Form::select('st_class',$classItems,old('st_class'),['id'=>'st_class','class'=>'form-control','required'=>'required','placeholder'=>'Select Class'])}}
                                            </div>
                                            <div class="form-group">
                                              {{Form::select('st_section',$sectionItems,old('st_secion'),['id'=>'st_section','class'=>'form-control','placeholder'=>'Select Section'])}}
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
                                        <br>
                                        <div class="col-md-4 col-md-offset-4">
                                          <h3 class="text-center">Search Student View</h3>
                                          {{Form::open(['url'=>URL::to('student/class-wise-view')])}}
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
                                              {{Form::number('st_roll_no',old('st_roll_no'),['class'=>'form-control','required'=>'required'])}}
                                            </div>
                                            <div class="form-group">
                                              {{Form::submit('submit',['class'=>'form-control btn-theme-color'])}}
                                            </div>
                                          {{Form::close()}}  
                                        </div>
                                      </div>
                                      <div id="stQuickview" class="tab-pane fade">
                                          <duv class="col-md-12">
                                              <div class="quick-view-filter">
                                                {{Form::open(['id'=>'quick-view-form'])}}
                                                <table class="table">
                                                    <thead>
                                                      <tr>
                                                        {{csrf_field()}}
                                                        <th>Filter By :</th>
                                                        <td>{{Form::select('st_session',[''=>'Select Session','2018'=>'2018','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023'],old('st_session'),['id'=>'st_session_filter','placeholder'=>'Select Session'])}}</td>
                                                        <td>{{Form::select('st_class',$classItems,old('st_class'),['id'=>'st_class_filter','placeholder'=>'Select Class'])}}</td>
                                                        <td>{{Form::select('st_section',[],old('st_section'),['id'=>'st_section_filter','placeholder'=>'Select Section'])}}</td>
                                                      </tr>
                                                  </table>
                                                {{Form::close()}}
                                              </div>
                                          </duv>
                                          <div class="col-md-12">
                                              <div class="student-quick-view table-responsive">

                                                  <table class="table">
                                                    <thead>
                                                      <th>SL</th>
                                                      <th>Photo</th>
                                                      <th>Name</th>
                                                      <th>Class</th>
                                                      <th>Roll</th>
                                                      <th>Section</th>
                                                      <th>Session</th>
                                                      <th>Phone</th>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <td>1</td>
                                                        <td>Photo</td>
                                                        <td>Lokman Hossain</td>
                                                        <td>One</td>
                                                        <td>12</td>
                                                        <td>A</td>
                                                        <td>2019</td>
                                                        <td>01797715122</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                              </div>
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



    <script type="text/javascript">

        $('#st_class_filter').change(function(){
          // console.log('changed')
        if($(this).val() != ''){
          var value = $(this).val();
          var _token = $('input[name="_token"]').val();
          console.log(_token);
          $.ajax({
            type:'post',
            url:'/section/check-section',
            data:{value:value,_token:_token},
            success:function(response){
              // console.log(response)
              // document.getElementById('subject_section').value = response
              $('#st_section_filter').html(response.data)
            }
          });

          
          // var x = $('#quick-view-form').serialize();          
           document.getElementById('st_section_filter').value = ''
          $.ajax({
            type:'post',
            url:'/student/quick-view/filter-student',
            data: $('#quick-view-form').serialize(),
            success:function(response){
              console.log(response)
            },
            error:function(error){
              console.log(error);
            }
          });
        }

      });


      $('#st_session_filter').change(function(){
          var x = $('#quick-view-form').serialize();          
            console.log(x)
          $.ajax({
            type:'post',
            url:'/student/quick-view/filter-student',
            data: $('#quick-view-form').serialize(),
            success:function(response){
              console.log(response)
            },
            error:function(error){
              console.log(error);
            }
          });
      });    

      $('#st_section_filter').change(function(){
          // var x = $('#quick-view-form').serialize();          
            // console.log(x)
          $.ajax({
            type:'post',
            url:'/student/quick-view/filter-student',
            data: $('#quick-view-form').serialize(),
            success:function(response){
              console.log(response)
            },
            error:function(error){
              console.log(error);
            }
          });
      });



    </script>
@endsection