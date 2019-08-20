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
                                        <h3 class="text-center"><i class="fa fa-user-circle"></i> Create New Exam</h3>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="main-content-body">
                                <div class="col-md-12">
                                    <div class="st-create-area">
                                        <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-theme-color" id="addExamBtn">
                                            Add New Exam
                                          </button>

                                          <!-- Modal -->
                                          <div class="modal fade" id="addExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <span class="modal-title" id="exampleModalLabel">Add New Exam</span>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="container-fluid">
                                                    {{Form::open(['id'=>'addExamForm'])}}
                                                      <div class="form-group">
                                                        {!! Form::select('exam_class',$classItems,old('st_class'),['id'=>'st_class','class'=>'form-control', 'required'=>'required','placeholder'=>'Select Class']) !!}
                                                      </div>
                                                      <div class="form-group">
                                                        {{Form::select('exam_session',[''=>'Select Session','2018'=>'2018','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023'],old('st_class'),['class'=>'form-control','required'=>'required'])}}
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="radio-style-group">
                                                            {{Form::radio('exam_type', 0,true,['id'=>'check-exam', 'class'=>'check_exam'])}}
                                                            <span class="checkmark"></span>Normal
                                                          </label>
                                                          <label class="radio-style-group">
                                                              {{Form::radio('exam_type', 1,null,['id'=>'check-exam', 'class'=>'check_exam'])}}
                                                              <span class="checkmark"></span>Monthly
                                                          </label>                                                     
                                                      </div>
                                                      <div class="form-group">
                                                        {{Form::text('exam_name',old('st_exam'),['id'=>'st_exam','class'=>'form-control', 'placeholder'=>'Enter Exam Name','required'=>'required'])}}
                                                      </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      {{Form::submit('Save Changes',['id'=>'addExamSubmit','class'=>'btn btn-theme-color'])}}
                                                    {{Form::close()}}
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>EXAM NAME</th>
                                                <th>CLASS</th>
                                                <th>SESSION</th>
                                                <th>TYPE</th>
                                                <th class="col-md-2">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($lastExams)
                                            @foreach($lastExams as $lastExam)
                                              <tr>
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$lastExam->exam_name}}</td>
                                                  <td>{{$lastExam->stClass->class_name}}</td>
                                                  <td>{{$lastExam->exam_session}}</td>
                                                  <td>
                                                    @if($lastExam->exam_type == 0)
                                                    {{'Normal'}}
                                                    @elseif($lastExam->exam_type == 1)
                                                    {{'Monthly'}}
                                                    @endif                                                    
                                                  </td>
                                                  <td><a class="exam-edit-btn btn btn-xs btn-info" id="{{$lastExam->id}}" ><i class="fa fa-edit"></i></a>  
                                                    <button id="{{$lastExam->id}}" class="exam-delete-btn btn btn-xs btn-danger" data="{{$lastExam->exam_name}}"><i class="fa fa-trash"></i></button>
                                                  </td>
                                              </tr>

                                              <div class="modal fade" id="{{'updateExamModal'.$lastExam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <span class="modal-title" id="exampleModalLabel">Add New Section</span>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="container-fluid">
                                                        {{Form::open(['id'=>'updateExamForm'.$lastExam->id])}}
                                                          <div class="form-group">
                                                            {!! Form::select('exam_class',$classItems ,$lastExam->exam_class,['class'=>'form-control', 'required'=>'required','placeholder'=>'Select Class']) !!}
                                                          </div>                                                          <div class="form-group">
                                                            {{Form::select('exam_session',[''=>'Select Session','2018'=>'2018','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023'],$lastExam->exam_session,['class'=>'form-control','required'=>'required'])}}
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="radio-style-group">
                                                                {!! Form::radio('exam_type', 0,true,['id'=>'check-exam', 'class'=>'check_exam']) !!}
                                                                <span class="checkmark"></span>Normal
                                                              </label>
                                                              <label class="radio-style-group">
                                                                {!! Form::radio('exam_type', 1,$lastExam->exam_type,['id'=>'check-exam', 'class'=>'check_exam']) !!}
                                                                <span class="checkmark"></span>Monthly
                                                              </label>                                                     
                                                          </div>
                                                          <div class="form-group">
                                                            {{Form::text('exam_name',$lastExam->exam_name,['id'=>'section_name','class'=>'form-control', 'placeholder'=>'Enter Section Name', 'required'=>'required'])}}
                                                          </div>
                                                          <input type="hidden" value="{{$lastExam->id}}" name="exam_id" id="section_id">
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          {{Form::submit('Update Changes',['id'=>'updateSectionSubmit','class'=>'btn btn-theme-color'])}}
                                                        {{Form::close()}}
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            @endforeach
                                          @endif
                                        </tbody>
                                    </table>
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