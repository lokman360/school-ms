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
                                          @endif
                                        <h3 class="text-center">View All Students</h3>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="main-content-body">
                                <div class="col-md-12">
                                    <div class="st-create-area">
                                       <a href="{{URL::to('student/create')}}" class="btn btn-style btn-theme-color btn-md"><i class="fa fa-arrow-left"></i> Back</a>
                                         <div class="row">
                                          @if($studentById)
                                            {!! Form::model($studentById,['url'=>URL::to('student',$studentById), 'class'=>'form', 'files'=>'true']) !!}
                                              {!!method_field('PUT')!!}
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
                                                              {!! Form::select('st_class',[''=>'Select Class','1'=>'One','2'=>'Two','3'=>'Three','4'=>'Four','5'=>'Five'],old('st_permanent_add'),['class'=>'form-control', 'required'=>'required']) !!}
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group">
                                                              {!! Form::label('Student Section :') !!}
                                                              {!! Form::select('st_section',[''=>'Select Section','1'=>'A','2'=>'B','3'=>'C','4'=>'D'],old('st_permanent_add'),['class'=>'form-control', 'required'=>'required']) !!}
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group">
                                                              {!! Form::label('Roll No. :') !!}
                                                              {!! Form::number('st_roll_no',old('st_permanent_add'),['class'=>'form-control', 'required'=>'required']) !!}
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group">
                                                              {!! Form::label('Student Section :') !!}
                                                              {!! Form::select('st_session',[''=>'Select Session','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023','2024'=>'2024','2025'=>'2025','2026'=>'2026','2027'=>'2027'],old('st_permanent_add'),['class'=>'form-control', 'required'=>'required']) !!}
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group">
                                                              {!! Form::label('Blood Group :') !!}
                                                              {!! Form::select('st_blood_group',[''=>'Select Group','1'=>'AB+','2'=>'AB-','3'=>'A+','4'=>'A-','5'=>'B+','6'=>'B-','6'=>'O+','7'=>'O-'],old('st_permanent_add'),['class'=>'form-control']) !!}
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group">
                                                              {!! Form::label('Religion :') !!}
                                                              {!! Form::select('st_religion',[''=>'Select Religion','1'=>'Islam','2'=>'Hindu','3'=>'Khristan'],old('st_permanent_add'),['class'=>'form-control', 'required'=>'required']) !!}
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="add_photo_view">
                                                              <img class="img img-responsive img-view" src="{!!asset('upload/'.$studentById->st_photo)!!}" alt="">
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
                                            @endif
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