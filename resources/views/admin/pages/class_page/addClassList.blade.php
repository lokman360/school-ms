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
                                          <button type="button" class="btn btn-theme-color" data-toggle="modal" data-target="#addClassModal">
                                            Add New Class
                                          </button>

                                          <!-- Modal -->
                                          <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    {{Form::open(['id'=>'addClasFrom'])}}
                                                      {{Form::text('class_name',old('class_name'),['id'=>'class_name','class'=>'form-control', 'placeholder'=>'Enter Class Name'])}}
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      {{Form::submit('Save Changes',['id'=>'addclassSubmit','class'=>'btn btn-theme-color'])}}
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
                                                <th>CLASS</th>
                                                <th>CLASS ID</th>
                                                <th class="col-md-2">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($lastClasses)
                                            @foreach($lastClasses as $lastClass)
                                              <tr id="btn-display">
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$lastClass->class_name}}</td>
                                                  <td>{{$lastClass->id}}</td>
                                                  <td><a class="class-edit-btn btn btn-xs btn-info" id="{{$lastClass->id}}" ><i class="fa fa-edit"></i></a>  
                                                    <button id="{{$lastClass->id}}" class="class-delete-btn btn btn-xs btn-danger" data="{{$lastClass->class_name}}"><i class="fa fa-trash"></i></button>
                                                  </td>
                                              </tr>

                                              <div class="modal fade" id="{{'addClassModal'.$lastClass->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <span class="modal-title" id="exampleModalLabel">Update Class</span>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="container-fluid">
                                                        {{Form::open(['id'=>'addClassFrom'.$lastClass->id])}}
                                                          {{Form::text('class_name',$lastClass->class_name,['id'=>'class_name','class'=>'form-control', 'placeholder'=>'Enter Class Name'])}}
                                                          <input type="hidden" value="{{$lastClass->id}}" name="class_id" id="class_id">
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          {{Form::submit('Update Changes',['id'=>'updateclassSubmit','class'=>'btn btn-theme-color'])}}
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