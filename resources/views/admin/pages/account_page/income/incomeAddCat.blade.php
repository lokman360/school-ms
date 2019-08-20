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
                                        <h3 class="text-center"><i class="fa fa-user-circle"></i> Income View</h3>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="main-content-body">
                                <div class="col-md-12">
                                   <ul class="nav nav-tabs">
                                      <li class="active"><a  href="{{URL::to('account/income/addcategory')}}">Income Category</a></li>
                                      <li><a  href="{{URL::to('account/income/addsubcategory')}}">Income Sub Category</a></li>
                                      <li ><a  href="{{URL::to('account/income/addincome')}}">Add Incomes</a></li>
                                      <li><a  href="{{URL::to('account/income/report')}}">Report</a></li>
                                    </ul>

                                    <div class="tab-content">
                                      <div id="addIncomeCat" class="tab-pane fade in active">
                                          <br>
                                          <div class="col-md-12">
                                            <div class="st-create-area">
                                                <!-- Button trigger modal -->
                                                  <button type="button" class="btn btn-theme-color" data-toggle="modal" data-target="#addIncomeCatModal">
                                                    Add Category
                                                  </button>
                                                  <!-- Modal -->
                                                  <div class="modal fade" id="addIncomeCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <span class="modal-title" id="exampleModalLabel">Add Category</span>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="container-fluid">
                                                            {{Form::open(['id'=>'addIncomeCatForm'])}}
                                                              {{Form::text('income_cat',old('income_cat'),['id'=>'income_cat','class'=>'form-control', 'placeholder'=>'Enter Category Name'])}}
                                                          </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                              {{Form::submit('Save Changes',['id'=>'addIncomeCat','class'=>'btn btn-theme-color'])}}
                                                            {{Form::close()}}
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                          <br>
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
                                                  @if($IncomeCats)
                                                    @foreach($IncomeCats as $IncomeCat)
                                                      <tr id="btn-display">
                                                          <td>{{$loop->iteration}}</td>
                                                          <td>{{$IncomeCat->income_cat}}</td>
                                                          <td>{{$IncomeCat->id}}</td>
                                                          <td><a class="income-cat-edit-btn btn btn-xs btn-info" id="{{$IncomeCat->id}}" ><i class="fa fa-edit"></i></a>  
                                                            <button id="{{$IncomeCat->id}}" class="income-cat-delete-btn btn btn-xs btn-danger" data="{{$IncomeCat->income_cat}}"><i class="fa fa-trash"></i></button>
                                                          </td>
                                                      </tr>

                                                      <div class="modal fade" id="{{'incomeCatModal'.$IncomeCat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                {{Form::open(['id'=>'updateIncomeCatForm'.$IncomeCat->id])}}
                                                                  {{Form::text('income_cat',$IncomeCat->income_cat,['id'=>'income_cat','class'=>'form-control', 'placeholder'=>'Enter Category Name'])}}
                                                                  <input type="hidden" value="{{$IncomeCat->id}}" name="income_cat_id" id="income_cat_id">
                                                              </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                  {{Form::submit('Update Changes',['id'=>'updateIncomeCatSubmit','class'=>'btn btn-theme-color'])}}
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