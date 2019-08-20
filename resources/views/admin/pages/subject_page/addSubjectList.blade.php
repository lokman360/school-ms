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
                                        <h3 class="text-center"><i class="fa fa-user-circle"></i> Create New Subject</h3>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="main-content-body">
                                <div class="col-md-12">
                                    <div class="st-create-area">
                                        <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-theme-color" id="add-subject-modal-btn">
                                            Add New Subject
                                          </button>

                                          <!-- Modal -->
                                          <div class="modal fade" id="add-subject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <span class="modal-title" id="exampleModalLabel">Add New Subject</span>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="container-fluid">
                                                    {{Form::open(['id'=>'addSubjectForm'])}}
                                                      <div class="form-group">
                                                      {!! Form::select('subject_class',$classItems,old('stubject_class'),['id'=>'subject_class','class'=>'form-control subject_class','required'=>'required','placeholder'=>'Select Class']) !!}
                                                    {{csrf_field()}} 
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="radio-style-group">
                                                          {{Form::radio('check_section', 0,true,['id'=>'check-section-btn1', 'class'=>'check_section'])}}
                                                          <span class="checkmark"></span>All Section
                                                        </label>
                                                        <label class="radio-style-group">
                                                            {{Form::radio('check_section', 1,null,['id'=>'check-section-btn2', 'class'=>'check_section'])}}
                                                            <span class="checkmark"></span>Select Section
                                                        </label>
                                                      </div>
                                                      <div id="section-items" class="form-group">
                                                        {!! Form::select('subject_section',[],old('subject_section'),['id'=>'subject_section','class'=>'form-control','placeholder'=>'Select Section']) !!}
                                                        {{-- <select name="subject_section" id="subject_section" class="form-control"> --}}
                                                            
                                                        </select>
                                                      </div>
                                                      <div class="form-group">                                                        
                                                      {{Form::text('subject_name',old('subject_name'),['id'=>'subject_name','class'=>'form-control', 'placeholder'=>'Enter Subject Name', 'required'=>'required'])}}
                                                      </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      {{Form::submit('Save Changes',['id'=>'addSubjectSubmit','class'=>'btn btn-theme-color'])}}
                                                    {{Form::close()}}
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-responsive table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>SUBJECT NAME</th>
                                                <th>CLASS</th>
                                                <th>SECTION</th>
                                                <th class="col-md-2">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($lastSubjects)
                                            @foreach($lastSubjects as $lastSubject)
                                              <tr>
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$lastSubject->subject_name}}</td>
                                                  <td>@isset($lastSubject->subject_class) {{$lastSubject->stClass->class_name}} @endisset</td>
                                                  <td>@isset($lastSubject->subject_section) {{$lastSubject->section->section_name}} @endisset</td>
                                                  <td><a class="subject-edit-btn btn btn-xs btn-info" id="{{$lastSubject->id}}" data="{{$lastSubject->subject_class}}" name="{{$lastSubject->subject_section}}"><i class="fa fa-edit"></i></a> | 
                                                    <button id="{{$lastSubject->id}}" class="subject-delete-btn btn btn-xs btn-danger" data="{{$lastSubject->subject_name}}"><i class="fa fa-trash"></i></button>
                                                  </td>
                                              </tr>

                                              <div class="modal fade" id="{{'update-subject-modal'.$lastSubject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <span class="modal-title" id="exampleModalLabel">Update Subject</span>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="container-fluid">
                                                        {{Form::open(['id'=>'updateSubjectForm'.$lastSubject->id])}}
                                                          <div class="form-group">
                                                          {!! Form::select('subject_class',$classItems,$lastSubject->subject_class,['id'=>'subject_class'.$lastSubject->id,'class'=>'form-control','required'=>'required']) !!}
                                                          </div>
                                                          <div class="form-group" >
                                                          {!! Form::select('subject_section',[],$lastSubject->subject_section,['id'=>'subject_section_update'.$lastSubject->id,'class'=>'form-control']) !!}
                                                          {{csrf_field()}}
                                                          </div>
                                                          <div class="form-group">                                                        
                                                          {{Form::text('subject_name',$lastSubject->subject_name,['id'=>'subject_name','class'=>'form-control', 'placeholder'=>'Enter Subject Name', 'required'=>'required'])}}
                                                          </div>
                                                          <input type="hidden" value="{{$lastSubject->id}}" name="subject_id" id="subject_id">

                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        {{Form::submit('Save Changes',['id'=>'addSubjectSubmit','class'=>'btn btn-theme-color'])}}
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