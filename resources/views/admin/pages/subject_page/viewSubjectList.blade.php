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
                                          @if($allSubjects)
                                            @foreach($allSubjects as $allSubject)
                                              <tr>
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$allSubject->subject_name}}</td>
                                                  <td>{{$allSubject->subject_class}}</td>
                                                  <td>{{$allSubject->subject_section}}</td>
                                                  <td><a class="subject-edit-btn btn btn-xs btn-info" id="{{$allSubject->id}}" data="{{$allSubject->subject_class}}" name="{{$allSubject->subject_section}}"><i class="fa fa-edit"></i></a> | 
                                                    <button id="{{$allSubject->id}}" class="subject-delete-btn btn btn-xs btn-danger" data="{{$allSubject->subject_name}}"><i class="fa fa-trash"></i></button>
                                                  </td>
                                              </tr>

                                              <div class="modal fade" id="{{'update-subject-modal'.$allSubject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        {{Form::open(['id'=>'updateSubjectForm'.$allSubject->id])}}
                                                          <div class="form-group">
                                                          {!! Form::select('subject_class',$classItems,$allSubject->subject_class,['id'=>'subject_class'.$allSubject->id,'class'=>'form-control','required'=>'required']) !!}
                                                          </div>
                                                          <div class="form-group" >
                                                          {!! Form::select('subject_section',[],$allSubject->subject_section,['id'=>'subject_section_update'.$allSubject->id,'class'=>'form-control']) !!}
                                                          {{csrf_field()}}
                                                          </div>
                                                          <div class="form-group">                                                        
                                                          {{Form::text('subject_name',$allSubject->subject_name,['id'=>'subject_name','class'=>'form-control', 'placeholder'=>'Enter Subject Name', 'required'=>'required'])}}
                                                          </div>
                                                          <input type="hidden" value="{{$allSubject->id}}" name="subject_id" id="subject_id">

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