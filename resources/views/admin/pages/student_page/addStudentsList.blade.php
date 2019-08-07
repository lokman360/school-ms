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
                                             <!-- Trigger the modal with a button -->
                                              <button type="button" class="btn btn-style btn-theme-color btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus"></i> New Student</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title"><i class="fa fa-user-plus"></i> Create New Student</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            {!! Form::open(['url'=>URL::to('student'), 'class'=>'form', 'files'=>'true']) !!}
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      {!! Form::label('Name :') !!}
                                                                      {!! Form::text('st_name',old('st_name'),['class'=>'form-control', 'required'=>'required']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Father\'s Name :') !!}
                                                                      {!! Form::text('st_f_name',old('st_f_name'),['class'=>'form-control', 'required'=>'required']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Mother\'s Name :') !!}
                                                                      {!! Form::text('st_m_name',old('st_m_name'),['class'=>'form-control']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Phone Number :') !!}
                                                                      {!! Form::number('st_phone',old('st_phone'),['class'=>'form-control', 'required'=>'required']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Email :') !!}
                                                                      {!! Form::email('st_email',old('st_email'),['class'=>'form-control']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Present Address :') !!}
                                                                      {!! Form::text('st_present_add',old('st_present_add'),['class'=>'form-control', 'required'=>'required']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Permanent Address :') !!}
                                                                      {!! Form::text('st_permanent_add',old('st_permanent_add'),['class'=>'form-control']) !!}
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="row">
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Student Class :') !!}
                                                                              {!! Form::select('st_class',[''=>'Select Class','1'=>'One','2'=>'Two','3'=>'Three','4'=>'Four','5'=>'Five'],old('st_class'),['class'=>'form-control', 'required'=>'required']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Student Section :') !!}
                                                                              {!! Form::select('st_section',[''=>'Select Section','1'=>'A','2'=>'B','3'=>'C','4'=>'D'],old('st_section'),['class'=>'form-control', 'required'=>'required']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Roll No. :') !!}
                                                                              {!! Form::number('st_roll_no',old('st_roll_no'),['class'=>'form-control', 'required'=>'required']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Student Section :') !!}
                                                                              {!! Form::select('st_session',[''=>'Select Session','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023','2024'=>'2024','2025'=>'2025','2026'=>'2026','2027'=>'2027'],old('st_session'),['class'=>'form-control', 'required'=>'required']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Blood Group :') !!}
                                                                              {!! Form::select('st_blood_group',[''=>'Select Group','1'=>'AB+','2'=>'AB-','3'=>'A+','4'=>'A-','5'=>'B+','6'=>'B-','6'=>'O+','7'=>'O-'],old('st_blood_group'),['class'=>'form-control']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Religion :') !!}
                                                                              {!! Form::select('st_religion',[''=>'Select Religion','1'=>'Islam','2'=>'Hindu','3'=>'Khristan'],old('st_religion'),['class'=>'form-control', 'required'=>'required']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="add_photo_view">

                                                                          </div>
                                                                          <input name="st_photo" type="file" id="file_id">
                                                                          <label for="file_id" class="file_label"><i class="fa fa-upload"></i> Attach Photo</label>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            {!! Form::label('Status :') !!}
                                                                            {!! Form::select('st_status',['1'=>'Active','0'=>'Deactive'],old('st_status'),['class'=>'form-control']) !!}
                                                                        </div>
                                                                      </div>
                                                                      <div class="col-md-12">
                                                                          {!! Form::submit('Submit',['class'=>'btn btn-theme-color form-control btn-style']) !!}
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                                <th>NAME</th>
                                                <th>ROLL</th>
                                                <th>CLASS</th>
                                                <th>SECTION</th>
                                                <th>SESSION</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($lastStudents)
                                            @foreach($lastStudents as $lastStudent)
                                              <tr>
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$lastStudent->st_name}}</td>
                                                  <td>{{$lastStudent->st_roll_no}}</td>
                                                  <td>{{$lastStudent->st_class}}</td>
                                                  <td>{{$lastStudent->st_section}}</td>
                                                  <td>{{$lastStudent->st_session}}</td>
                                                  <td><button class="btn btn-xs btn-info" data-toggle="modal" data-target="{{'#single-view'.$lastStudent->id}}"><i class="fa fa-eye"></i></button> | <button class="btn btn-xs btn-info" data-toggle="modal" data-target="{{'#single-edit'.$lastStudent->id}}"><i class="fa fa-edit"></i></button> | 
                                                    {{Form::open(['url'=>URL::to('student',$lastStudent->id),'class'=>'delete-form'])}}
                                                      {{method_field('DELETE')}}
                                                      <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                                    {{Form::close()}}                   
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="{{'single-view'.$lastStudent->id}}" role="dialog">
                                                      <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-user-plus"></i> Create New Student</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                  <div class="st-signle-view-area">
                                                                    <h2 class="text-center">Rangpur High School And College, Rangpur</h2>
                                                                    <h4 class="text-center"><i>Email: rangpurhs@gmail.comi, &nbsp; www.rhs.gov.bd</i></h4>
                                                                    <p class="text-center"><i>Phone: 01797715122, 01710460186</i></p>
                                                                    <br>
                                                                    <div class="col-md-3">
                                                                      <div class="st-single-view-photo">
                                                                          @if($lastStudent->st_photo)
                                                                            <img src="{{asset('upload/'.$lastStudent->st_photo)}}" class="img img-responsive img-thumbnail" alt="">
                                                                            
                                                                          @else
                                                                            <img src="{{asset('dist/img/user.png')}}" class="img img-responsive img-thumbnail" alt="">
                                                                          @endif
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                      <div class="st-single-view-bio">
                                                                          <table class="table table-responsive st-bio-top-table">
                                                                            <thead>
                                                                              <tr>
                                                                                <td>Name : </td>
                                                                                <td>{{$lastStudent->st_name}}</td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td>Class : </td>
                                                                                <td>{{$lastStudent->st_class}}</td>
                                                                                <td>Section :</td>
                                                                                <td>{{$lastStudent->st_section}}</td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td>Roll No : </td>
                                                                                <td>{{$lastStudent->st_roll_no}}</td>
                                                                                <td>Religion :</td>
                                                                                <td>{{$lastStudent->st_religion}}</td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td>Session: </td>
                                                                                <td>{{$lastStudent->st_session}}</td>
                                                                                <td>Blood Group :</td>
                                                                                <td>{{$lastStudent->st_blood_group}}</td>
                                                                              </tr>
                                                                            </thead>
                                                                          </table>
                                                                      </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-md-12">
                                                                      <h3 class="text-center"><i>Other informations</i></h3>
                                                                      <table class="table table-responsive table-bordered ">
                                                                        <tbody>
                                                                          <tr>
                                                                            <td>Name : </td>
                                                                            <td>{{$lastStudent->st_name}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Father's Name : </td>
                                                                            <td>{{$lastStudent->st_f_name}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Mother's Name : </td>
                                                                            <td>{{$lastStudent->st_m_name}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Phone Number : </td>
                                                                            <td>{{$lastStudent->st_phone}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Email : </td>
                                                                            <td>{{$lastStudent->st_email}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Present Address : </td>
                                                                            <td>{{$lastStudent->st_present_add}}</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Permanent Address : </td>
                                                                            <td>{{$lastStudent->st_permanent_add}}</td>
                                                                          </tr>
                                                                        </tbody>
                                                                      </table>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-md-12">
                                                                      <table class="table table-responsive table-bordered ">
                                                                          <tbody class="text-center">
                                                                            <td><h4><i>Email: rangpurhs@gmail.comi, &nbsp; www.rhs.gov.bd, &nbsp; Phone: 01797715122, 01710460186</i></h4></td>
                                                                          </tbody>
                                                                      </table>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                          </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>





                                                        <!-- Modal -->
                                                    <div class="modal fade" id="{{'single-edit'.$lastStudent->id}}" role="dialog">
                                                      <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-user-plus"></i> Create New Student</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                  <div class="st-signle-view-area">

                                                                  <div class="row">
                                                                      {!! Form::open(['url'=>URL::to('student'), 'class'=>'form', 'files'=>'true']) !!}
                                                                        {!!method_field('PUT')!!}
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                {!! Form::label('Name :') !!}
                                                                                {!! Form::text('st_name',$lastStudent->st_name,['class'=>'form-control', 'required'=>'required']) !!}
                                                                            </div>
                                                                            <div class="form-group">
                                                                                {!! Form::label('Father\'s Name :') !!}
                                                                                {!! Form::text('st_f_name',$lastStudent->st_f_name,['class'=>'form-control', 'required'=>'required']) !!}
                                                                            </div>
                                                                            <div class="form-group">
                                                                                {!! Form::label('Mother\'s Name :') !!}
                                                                                {!! Form::text('st_m_name',$lastStudent->st_m_name,['class'=>'form-control']) !!}
                                                                            </div>
                                                                            <div class="form-group">
                                                                                {!! Form::label('Phone Number :') !!}
                                                                                {!! Form::number('st_phone',$lastStudent->st_phone,['class'=>'form-control', 'required'=>'required']) !!}
                                                                            </div>
                                                                            <div class="form-group">
                                                                                {!! Form::label('Email :') !!}
                                                                                {!! Form::email('st_email',$lastStudent->st_email,['class'=>'form-control']) !!}
                                                                            </div>
                                                                            <div class="form-group">
                                                                                {!! Form::label('Present Address :') !!}
                                                                                {!! Form::text('st_present_add',$lastStudent->st_present_add,['class'=>'form-control', 'required'=>'required']) !!}
                                                                            </div>
                                                                            <div class="form-group">
                                                                                {!! Form::label('Permanent Address :') !!}
                                                                                {!! Form::text('st_permanent_add',$lastStudent->st_permanent_add,['class'=>'form-control']) !!}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('Student Class :') !!}
                                                                                        {!! Form::select('st_class',[''=>'Select Class','1'=>'One','2'=>'Two','3'=>'Three','4'=>'Four','5'=>'Five'],$lastStudent->st_class,['class'=>'form-control', 'required'=>'required']) !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('Student Section :') !!}
                                                                                        {!! Form::select('st_section',[''=>'Select Section','1'=>'A','2'=>'B','3'=>'C','4'=>'D'],$lastStudent->st_section,['class'=>'form-control', 'required'=>'required']) !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('Roll No. :') !!}
                                                                                        {!! Form::number('st_roll_no',$lastStudent->st_roll_no,['class'=>'form-control', 'required'=>'required']) !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('Student Section :') !!}
                                                                                        {!! Form::select('st_session',[''=>'Select Session','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023','2024'=>'2024','2025'=>'2025','2026'=>'2026','2027'=>'2027'],$lastStudent->st_session,['class'=>'form-control', 'required'=>'required']) !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('Blood Group :') !!}
                                                                                        {!! Form::select('st_blood_group',[''=>'Select Group','1'=>'AB+','2'=>'AB-','3'=>'A+','4'=>'A-','5'=>'B+','6'=>'B-','6'=>'O+','7'=>'O-'],$lastStudent->st_blood_group,['class'=>'form-control']) !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('Religion :') !!}
                                                                                        {!! Form::select('st_religion',[''=>'Select Religion','1'=>'Islam','2'=>'Hindu','3'=>'Khristan'],$lastStudent->st_religion,['class'=>'form-control', 'required'=>'required']) !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="add_photo_view">
                                                                                      @if($lastStudent->st_photo)
                                                                                          <img src="{{asset('upload/'.$lastStudent->st_photo)}}" class="img img-responsive img-view" alt="">
                                                                                          
                                                                                        @else
                                                                                          <img src="{{asset('dist/img/user.png')}}" class="img img-responsive img-view" alt="">
                                                                                        @endif
                                                                                    </div>
                                                                                    <input name="st_photo" type="file" id="file_id">
                                                                                    <label for="file_id" class="file_label"><i class="fa fa-upload"></i> Attach Photo</label>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                  <div class="form-group">
                                                                                      {!! Form::label('Status :') !!}
                                                                                      {!! Form::select('st_status',['1'=>'Active','0'=>'Deactive'],old('st_permanent_add'),['class'=>'form-control']) !!}
                                                                                  </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    {!! Form::submit('Submit',['class'=>'btn btn-theme-color form-control btn-style']) !!}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                      {!! Form::close() !!}
                                                                  </div>





                                                                  </div>
                                                               </div>
                                                            </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                     
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