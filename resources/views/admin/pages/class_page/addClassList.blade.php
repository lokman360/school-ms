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
                                    <div class="st-create-area">
                                        <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-theme-color" data-toggle="modal" data-target="#exampleModal">
                                            Add New Class
                                          </button>

                                          <!-- Modal -->
                                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                      {{Form::open(['url'=>URL::to('')])}}
                                                      {{Form::text('st_class',old('st_class'),['class'=>'form-control', 'placeholder'=>'Enter Class Name'])}}

                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      {{Form::submit('Save Changes',['class'=>'btn btn-theme-color'])}}
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
                                                <th>CLASS</th>
                                                <th>CLASS ID</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($lastClasses)
                                            @foreach($lastClasses as $lastClass)
                                              <tr>
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$lastClass->class_name}}</td>
                                                  <td>{{$lastClass->id}}</td>
                                                  <td><button class="btn btn-xs btn-info" ><i class="fa fa-eye"></i></button> | <a class="btn btn-xs btn-info" href="{{URL::to('student/'.$lastClass->id.'/edit')}}"><i class="fa fa-edit"></i></a> | 
                                                    {{Form::open(['url'=>URL::to('student',$lastClass->id),'class'=>'delete-form'])}}
                                                      {{method_field('DELETE')}}
                                                      <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                                    {{Form::close()}}  
                                                  </td>
                                              </tr>
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