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
                                      <li ><a  href="{{URL::to('account/income/addcategory')}}">Income Category</a></li>
                                      <li><a  href="{{URL::to('account/income/addsubcategory')}}">Income Sub Category</a></li>
                                      <li class="active"><a  href="{{URL::to('account/income/addincome')}}">Add Incomes</a></li>
                                      <li><a  href="{{URL::to('account/income/report')}}">Report</a></li>
                                    </ul>

                                    <div class="tab-content">
                                      <div id="addIncomeCat" class="tab-pane fade in active">
                                          <br>
                                          <div class="col-md-12">
                                            <div class="st-create-area">
                                                <!-- Button trigger modal -->
                                                  <button type="button" class="btn btn-theme-color" data-toggle="modal" data-target="#addIncomeModal">
                                                    Add Income
                                                  </button>
                                                  <!-- Modal -->
                                                  <div class="modal fade" id="addIncomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <span class="modal-title" id="exampleModalLabel">Add Income</span>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="container-fluid">
                                                            {{Form::open(['id'=>'addIncomeForm'])}}
                                                               <div class="form-group">
                                                                {{Form::select('income_cat',$incomeCatItems,old('income_cat'),['id'=>'income_cat','class'=>'form-control','placeholder'=>'Select Category','required'=>'required'])}}
                                                              </div>
                                                              <div class="form-group">
                                                                {{Form::select('income_sub_cat',[],old('income_sub_cat'),['id'=>'income_sub_cat','class'=>'form-control','placeholder'=>'Select Sub Category'])}}
                                                              </div>
                                                              <div class="input-group ">
                                                                {{Form::number('income_amount',old('income_amount'),['id'=>'income_amount','class'=>'form-control text-center ', 'placeholder'=>'0 ','required'=>'required'])}}
                                                                <span class="input-group-addon">৳ /=</span>
                                                              </div>
                                                          </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                              {{Form::submit('Save Changes',['id'=>'addIncome','class'=>'btn btn-theme-color'])}}
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
                                                        <th>CATEGORY</th>
                                                        <th>SUB CATEGORY</th>
                                                        <th>AMOUNT</th>
                                                        <th>DATE & TIME</th>
                                                        <th class="col-md-2">ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @if($Incomes)
                                                    @foreach($Incomes as $Income)
                                                      <tr id="btn-display">
                                                          <td>{{$loop->iteration}}</td>
                                                          <td>@isset($Income->IncomeCat) {{$Income->IncomeCat->income_cat}} @endisset</td>
                                                          <td>@isset($Income->IncomeSubCat){{$Income->IncomeSubCat->income_sub_cat}} @endisset</td>
                                                          <td>{{$Income->income_amount}} /=</td>
                                                          <td>{{$Income->created_at}}</td>
                                                          <td><a class="income-cat-edit-btn btn btn-xs btn-info" id="{{$Income->id}}" ><i class="fa fa-edit"></i></a>  
                                                            <button id="{{$Income->id}}" class="income-cat-delete-btn btn btn-xs btn-danger" data="{{$Income->income_cat}}"><i class="fa fa-trash"></i></button>
                                                          </td>
                                                      </tr>
                                                      <div class="modal fade" id="{{'incomeCatModal'.$Income->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                {{Form::open(['id'=>'updateIncomeCatForm'.$Income->id])}}
                                                                  {{Form::text('income_cat',$Income->income_cat,['id'=>'income_cat','class'=>'form-control', 'placeholder'=>'Enter Category Name'])}}
                                                                  <input type="hidden" value="{{$Income->id}}" name="income_cat_id" id="income_cat_id">
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
                                                    <tr>
                                                      <td colspan="3"><b class="float_right">TOTAL : </b></td>
                                                      <td><b>{{ $totalIncome }} /=</b></td>
                                                      <td></td>
                                                    </tr>
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

    <script type="text/javascript">
        //----------< START >----------//
          //->when change class then get section for this
          $('#income_cat').change(function(){
            var value = $(this).val();
            var _token = $('input[name="_token"]').val();
            // console.log(_token);
            $.ajax({
              type:'post',
              url:'/account/check-income-sub-cat',
              data:{value:value,_token:_token},
              success:function(response){
                // console.log(response)
                // document.getElementById('subject_section').value = response
                $('#income_sub_cat').html(response.data)
              }
            });
          }); 
        //----------< END >----------//
    </script>
@endsection