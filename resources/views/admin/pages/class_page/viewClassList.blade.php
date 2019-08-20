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
                                        <h3 class="text-center"><i class="fa fa-book"></i> View All Classes</h3>
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
                                                <th>CLASS</th>
                                                <th>CLASS ID</th>
                                                <th class="col-md-2">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($allClasses)
                                            @foreach($allClasses as $allClass)
                                              <tr>
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$allClass->class_name}}</td>
                                                  <td>{{$allClass->id}}</td>
                                                  <td><a class="class-edit-btn btn btn-xs btn-info" id="{{$allClass->id}}" ><i class="fa fa-edit"></i></a> | 
                                                    <button id="{{$allClass->id}}" class="class-delete-btn btn btn-xs btn-danger" data="{{$allClass->class_name}}"><i class="fa fa-trash"></i></button>
                                                  </td>
                                              </tr>

                                              <div class="modal fade" id="{{'addClassModal'.$allClass->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        {{Form::open(['id'=>'addClassFrom'.$allClass->id])}}
                                                          {{Form::text('class_name',$allClass->class_name,['id'=>'class_name','class'=>'form-control', 'placeholder'=>'Enter Class Name'])}}
                                                          <input type="hidden" value="{{$allClass->id}}" name="class_id" id="class_id">
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