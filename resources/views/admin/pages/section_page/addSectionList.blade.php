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
                                    <div class="st-create-area">
                                        <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-theme-color" id="addSectionBtn">
                                            Add New Section
                                          </button>

                                          <!-- Modal -->
                                          <div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    {{Form::open(['id'=>'addSectionForm'])}}
                                                      <div class="form-group">
                                                        {!! Form::select('section_class',$classItems,old('section_class'),['class'=>'form-control', 'required'=>'required','placeholder'=>'Select Class']) !!}
                                                      </div>
                                                      <div class="form-group">
                                                        {{Form::text('section_name',old('section_name'),['id'=>'section_name','class'=>'form-control', 'placeholder'=>'Enter Section Name','required'=>'required'])}}
                                                      </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      {{Form::submit('Save Changes',['id'=>'addSectionSubmit','class'=>'btn btn-theme-color'])}}
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
                                                <th>SECTION NAME</th>
                                                <th>CLASS</th>
                                                <th class="col-md-2">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($lastSections)
                                            @foreach($lastSections as $lastSection)
                                              <tr>
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$lastSection->section_name}}</td>
                                                  <td>{{$lastSection->stClass->class_name}}</td>
                                                  <td><a class="section-edit-btn btn btn-xs btn-info" id="{{$lastSection->id}}" ><i class="fa fa-edit"></i></a>  
                                                    <button id="{{$lastSection->id}}" class="section-delete-btn btn btn-xs btn-danger" data="{{$lastSection->section_name}}"><i class="fa fa-trash"></i></button>
                                                  </td>
                                              </tr>

                                              <div class="modal fade" id="{{'updateSectionModal'.$lastSection->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        {{Form::open(['id'=>'updateSectionForm'.$lastSection->id])}}
                                                          <div class="form-group">
                                                            {!! Form::select('section_class',$classItems ,$lastSection->section_class,['class'=>'form-control', 'required'=>'required']) !!}
                                                          </div>
                                                          <div class="form-group">
                                                            {{Form::text('section_name',$lastSection->section_name,['id'=>'section_name','class'=>'form-control', 'placeholder'=>'Enter Section Name', 'required'=>'required'])}}
                                                          </div>
                                                          <input type="hidden" value="{{$lastSection->id}}" name="section_id" id="section_id">
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