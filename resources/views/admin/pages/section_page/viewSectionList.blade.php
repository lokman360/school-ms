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
                                        <h3 class="text-center"><i class="fa fa-user-circle"></i> View All Section</h3>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="main-content-body">
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
                                          @if($allSections)
                                            @foreach($allSections as $allSection)
                                              <tr>
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$allSection->section_name}}</td>
                                                  <td>{{$allSection->section_class}}</td>
                                                  <td><a class="section-edit-btn btn btn-xs btn-info" id="{{$allSection->id}}" ><i class="fa fa-edit"></i></a>  
                                                    <button id="{{$allSection->id}}" class="section-delete-btn btn btn-xs btn-danger" data="{{$allSection->section_name}}"><i class="fa fa-trash"></i></button>
                                                  </td>
                                              </tr>

                                              <div class="modal fade" id="{{'updateSectionModal'.$allSection->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <span class="modal-title" id="exampleModalLabel">Add New Class</span>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="container-fluid">
                                                        {{Form::open(['id'=>'updateSectionForm'.$allSection->id])}}
                                                          <div class="form-group">
                                                            {!! Form::select('section_class',[''=>'Select Class','1'=>'One','2'=>'Two','3'=>'Three','4'=>'Four','5'=>'Five'],$allSection->section_class,['class'=>'form-control', 'required'=>'required']) !!}
                                                          </div>
                                                          <div class="form-group">
                                                            {{Form::text('section_name',$allSection->section_name,['id'=>'section_name','class'=>'form-control', 'placeholder'=>'Enter Section Name', 'required'=>'required'])}}
                                                          </div>
                                                          <input type="hidden" value="{{$allSection->id}}" name="section_id" id="section_id">
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