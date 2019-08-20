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
                                        <h3 class="text-center"><i class="fa fa-user-circle"></i> Download Exam Seat Plan</h3>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="main-content-body">
                                <div class="col-md-12">
                                   <ul class="nav nav-tabs">
                                      <li class="active"><a data-toggle="tab" href="#home">View Exam Seat Plan</a></li>
                                    
                                    </ul>

                                    <div class="tab-content">
                                      <div id="home" class="tab-pane fade in active">
                                        <br>
                                        <div class="col-md-4 col-md-offset-4">
                                          <h3 class="text-center">Exams Seat Plan</h3>
                                          {{Form::open(['url'=>URL::to('download/seatplan')])}}
                                            <div class="form-group">
                                              {{Form::select('st_class',$classItems,old('st_class'),['id'=>'st_class','class'=>'form-control exam-class','required'=>'required','placeholder'=>'Select Class'])}}
                                            </div>
                                            <div class="form-group">
                                              {{Form::select('st_section',[],old('st_secion'),['id'=>'st_section','class'=>'form-control st_section_hide','placeholder'=>'Select Section'])}}
                                            </div>
                                            <div class="form-group">
                                              {{Form::select('st_session',[''=>'Select Session','2018'=>'2018','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023'],old('st_class'),['id'=>'exam_session','class'=>'form-control','required'=>'required'])}}
                                            </div>
                                            <div class="form-group">
                                              {{Form::select('st_exam',[],old('st_exam'),['id'=>'st_exam','class'=>'form-control','required'=>'required','placeholder'=>'Select Exam'])}}
                                            </div>
                                            <div class="form-group">
                                              {{Form::submit('submit',['class'=>'form-control btn-theme-color'])}}
                                            </div>
                                          {{Form::close()}}  
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
      $(document).ready(function(){

          /// When back then check data and set from database///
            var value = $('#st_class').val();
            var _token = $('input[name="_token"]').val();
            // console.log(_token);
            $.ajax({
              type:'post',
              url:'/section/check-section',
              data:{value:value,_token:_token},
              success:function(response){
                // console.log(response)
                // document.getElementById('subject_section').value = response
                $('#st_section').html(response.data)
              }
            });

          /// When back then check data and set from database///

            var stclass = $('#st_class').val();
            var value = $('#exam_session').val();
            var _token = $('input[name="_token"]').val();
            // console.log(stclass);
            $.ajax({
              type:'post',
              url:'/exam/check-exam',
              data:{value:value,_token:_token,stclass:stclass},
              success:function(response){
                // console.log(response)
                // document.getElementById('subject_section').value = response
                $('#st_exam').html(response.data)
              }
            });

            // -------------------------< END >-------------------//



            /// EXAM SESSION CHANGE DEPENDED BY CLASS///
            $('#st_section').hide();
            $('#st_class').change(function(){
              var value = $(this).val();
              var _token = $('input[name="_token"]').val();
              document.getElementById('exam_session').value = ''
              // console.log(_token);
              $.ajax({
                type:'post',
                url:'/section/check-section',
                data:{value:value,_token:_token},
                success:function(response){
                  $('#st_section').show();
                  // console.log(response)
                  // document.getElementById('subject_section').value = response
                  $('#st_section').html(response.data)
                }
              });
              
            }); 
            // -------------------------< END >-------------------//
            

  
      });
    </script>

@endsection