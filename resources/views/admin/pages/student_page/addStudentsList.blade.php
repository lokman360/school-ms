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
                                             <!-- Trigger the modal with a button -->
                                              <button type="button" class="btn btn-style btn-theme-color btn-md" data-toggle="modal" data-target="#addStudentModal"><i class="fa fa-user-plus"></i> New Student</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="addStudentModal" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title"><i class="fa fa-user-plus"></i> Create New Student</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            {!! Form::open(['id'=>'studentAddForm','class'=>'form', 'files'=>'true']) !!}
                                                              
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      {!! Form::label('Name :') !!}
                                                                      {!! Form::text('st_name',old('st_name'),['id'=>'st_name','class'=>'form-control', 'required'=>'required']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Father\'s Name :') !!}
                                                                      {!! Form::text('st_f_name',old('st_f_name'),['id'=>'st_f_name','class'=>'form-control']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Mother\'s Name :') !!}
                                                                      {!! Form::text('st_m_name',old('st_m_name'),['id'=>'st_m_name','class'=>'form-control']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Phone Number :') !!}
                                                                      {!! Form::number('st_phone',old('st_phone'),['id'=>'st_phone','class'=>'form-control']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Email :') !!}
                                                                      {!! Form::email('st_email',old('st_email'),['id'=>'st_email','class'=>'form-control']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Present Address :') !!}
                                                                      {!! Form::text('st_present_add',old('st_present_add'),['id'=>'st_present_add','class'=>'form-control']) !!}
                                                                  </div>
                                                                  <div class="form-group">
                                                                      {!! Form::label('Permanent Address :') !!}
                                                                      {!! Form::text('st_permanent_add',old('st_permanent_add'),['id'=>'st_permanent_add','class'=>'form-control']) !!}
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="row">
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Student Class :') !!}
                                                                              {!! Form::select('st_class',$classItems,old('st_class'),['id'=>'st_class','class'=>'form-control', 'required'=>'required','placeholder'=>'Select Class']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                            {{csrf_field()}}
                                                                              {!! Form::label('Student Section :') !!}
                                                                              {!! Form::select('st_section',[],old('st_section'),['id'=>'st_section','class'=>'form-control', 'placeholder'=>'Select Section']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Roll No. :') !!}
                                                                              {!! Form::number('st_roll_no',old('st_roll_no'),['id'=>'st_roll_no','class'=>'form-control', 'required'=>'required']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Student Session :') !!}
                                                                              {!! Form::select('st_session',[''=>'Select Session','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023','2024'=>'2024','2025'=>'2025','2026'=>'2026','2027'=>'2027'],old('st_session'),['id'=>'st_session','class'=>'form-control', 'required'=>'required']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Blood Group :') !!}
                                                                              {!! Form::select('st_blood_group',[''=>'Select Group','1'=>'AB+','2'=>'AB-','3'=>'A+','4'=>'A-','5'=>'B+','6'=>'B-','6'=>'O+','7'=>'O-'],old('st_blood_group'),['id'=>'st_blood_group','class'=>'form-control']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              {!! Form::label('Religion :') !!}
                                                                              {!! Form::select('st_religion',[''=>'Select Religion','1'=>'Islam','2'=>'Hindu','3'=>'Khristan'],old('st_religion'),['id'=>'st_religion','class'=>'form-control']) !!}
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="add_photo_view">
                                                                              <img id="read-img" class="st_img-view" src="#" alt="No Photo">
                                                                          </div>
                                                                          <input name="st_photo" type="file" id="st_photo">
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            {!! Form::label('Status :') !!}
                                                                            {!! Form::select('st_status',['1'=>'Active','0'=>'Deactive'],old('st_status'),['class'=>'form-control']) !!}
                                                                        </div>
                                                                      </div>
                                                                      <div class="col-md-12">
                                                                          {!! Form::submit('Submit',['id'=>'submit', 'class'=>'btn btn-theme-color form-control btn-style']) !!}
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
                                    <div class="table-responsive">
                                      <table class="table table-hover">
                                          <thead>
                                              <tr>
                                                  <th>SL</th>
                                                  <th>NAME</th>
                                                  <th>ROLL</th>
                                                  <th>CLASS</th>
                                                  <th>SECTION</th>
                                                  <th>SESSION</th>
                                                  <th class="col-action-2 col-xs-3">ACTION</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            @if($lastStudents)
                                              @foreach($lastStudents as $lastStudent)
                                                <tr id="btn-display">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$lastStudent->st_name}}</td>
                                                    <td>{{$lastStudent->st_roll_no}}</td>
                                                    <td>
                                                      @isset($lastStudent->st_class) 
                                                        {{$lastStudent->stClass->class_name}}
                                                      @endisset
                                                    </td>
                                                    <td>
                                                      @isset($lastStudent->st_section)
                                                      {{$lastStudent->section->section_name}}
                                                      @endisset
                                                    </td>
                                                    <td>{{$lastStudent->st_session}}</td>
                                                    <td><button class="btn btn-xs btn-info" data-toggle="modal" data-target="{{'#single-view'.$lastStudent->id}}"><i class="fa fa-eye"></i></button> <button id="{{$lastStudent->id}}" data="{{$lastStudent->st_class}}" name="{{$lastStudent->st_section}}" class="edit btn btn-xs btn-warning" ><i class="fa fa-edit"></i></button> 
                                                      
                                                      <button id='{{$lastStudent->id}}' data="{{$lastStudent->st_name}}" class="st-delete-btn btn btn-xs btn-danger btn-display-hover"><i class="fa fa-trash"></i></button>
                                                                        
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
                                                                    <div class="st-signle-view-area" style="overflow-y: auto">
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
                                                                        <div class="st-single-view-bio table-responsive">
                                                                            <table class="table  st-bio-top-table">
                                                                              <thead>
                                                                                <tr>
                                                                                  <td>Name : </td>
                                                                                  <td>{{$lastStudent->st_name}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                  <td>Class : </td>
                                                                                  <td>
                                                                                    @isset($lastStudent->st_class) 
                                                                                      {{$lastStudent->stClass->class_name}}
                                                                                    @endisset
                                                                                  </td>
                                                                                  <td>Section :</td>
                                                                                  <td>
                                                                                    @isset($lastStudent->st_section)
                                                                                      {{$lastStudent->section->section_name}}
                                                                                    @endisset
                                                                                  </td>
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
                                                                        <div class="other-info-area table-responsive">
                                                                          <table class="table  table-bordered ">
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
                                                                      <form id="{{'studentUpdateForm'.$lastStudent->id}}" class="form" enctype="multipart/form-data">
                                                                          {{csrf_field()}}
                                                                          <div class="col-md-6">
                                                                              <div class="form-group">
                                                                                  {!! Form::label('Name :') !!}
                                                                                  {!! Form::text('st_name',$lastStudent->st_name,['class'=>'form-control', 'required'=>'required']) !!}
                                                                              </div>
                                                                              <div class="form-group">
                                                                                  {!! Form::label('Father\'s Name :') !!}
                                                                                  {!! Form::text('st_f_name',$lastStudent->st_f_name,['class'=>'form-control']) !!}
                                                                              </div>
                                                                              <div class="form-group">
                                                                                  {!! Form::label('Mother\'s Name :') !!}
                                                                                  {!! Form::text('st_m_name',$lastStudent->st_m_name,['class'=>'form-control']) !!}
                                                                              </div>
                                                                              <div class="form-group">
                                                                                  {!! Form::label('Phone Number :') !!}
                                                                                  {!! Form::number('st_phone',$lastStudent->st_phone,['class'=>'form-control']) !!}
                                                                              </div>
                                                                              <div class="form-group">
                                                                                  {!! Form::label('Email :') !!}
                                                                                  {!! Form::email('st_email',$lastStudent->st_email,['class'=>'form-control']) !!}
                                                                              </div>
                                                                              <div class="form-group">
                                                                                  {!! Form::label('Present Address :') !!}
                                                                                  {!! Form::text('st_present_add',$lastStudent->st_present_add,['class'=>'form-control']) !!}
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
                                                                                          {!! Form::select('st_class',$classItems,$lastStudent->st_class,['id'=>'st_class_update'.$lastStudent->id,'class'=>'form-control', 'required'=>'required','placeholder'=>'Select Class']) !!}
                                                                                          {{csrf_field()}}
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="col-md-6">
                                                                                      <div class="form-group">
                                                                                          {!! Form::label('Student Section :') !!}
                                                                                          {!! Form::select('st_section',[],$lastStudent->st_section,['id'=>'st_section_update'.$lastStudent->id,'class'=>'form-control']) !!}
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
                                                                                          {!! Form::select('st_religion',[''=>'Select Religion','1'=>'Islam','2'=>'Hindu','3'=>'Khristan'],$lastStudent->st_religion,['class'=>'form-control']) !!}
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
                                                                                      <input name="st_photo" type="file" id="st_photo">
                                                                                    </div>
                                                                                  <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('Status :') !!}
                                                                                        {!! Form::select('st_status',['1'=>'Active','0'=>'Deactive'],old('st_permanent_add'),['class'=>'form-control']) !!}
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-md-12">
                                                                                      <input id="update_id" name="update_id" type="hidden" value="{{$lastStudent->id}}">
                                                                                      {!! Form::submit('Update',['id'=>'update','class'=>'btn btn-theme-color form-control btn-style']) !!}
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                        </form>
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
                    </div>
                </section>
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

