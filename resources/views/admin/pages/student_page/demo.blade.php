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
                                  <div class="st-signle-view-area">
                                      <h2 class="text-center">Rangpur High School And College, Rangpur</h2>
                                      <h4 class="text-center"><i>Email: rangpurhs@gmail.comi, &nbsp; www.rhs.gov.bd</i></h4>
                                      <p class="text-center"><i>Phone: 01797715122, 01710460186</i></p>
                                      <br>
                                      <div class="col-md-3">
                                        <div class="st-single-view-photo">
                                            <img src="{{asset('upload/160688751565082354.jpg')}}" class="img img-responsive img-thumbnail" alt="">
                                        </div>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="st-single-view-bio">
                                            <table class="table table-responsive st-bio-top-table">
                                              <thead>
                                                <tr>
                                                  <td>Name : </td>
                                                  <td>Lokman Hossain</td>
                                                </tr>
                                                <tr>
                                                  <td>Class : </td>
                                                  <td>Six</td>
                                                  <td>Section :</td>
                                                  <td>A</td>
                                                </tr>
                                                <tr>
                                                  <td>Roll No : </td>
                                                  <td>120</td>
                                                  <td>Religion :</td>
                                                  <td>Islam</td>
                                                </tr>
                                                <tr>
                                                  <td>Session: </td>
                                                  <td>2019</td>
                                                  <td>Blood Group :</td>
                                                  <td>B+</td>
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
                                              <td>Lokman Hossain</td>
                                            </tr>
                                            <tr>
                                              <td>Father's Name : </td>
                                              <td>Motiar Rahman</td>
                                            </tr>
                                            <tr>
                                              <td>Mother's Name : </td>
                                              <td>Mst. Lutfa Begum</td>
                                            </tr>
                                            <tr>
                                              <td>Phone Number : </td>
                                              <td>01797715122, 01797715122</td>
                                            </tr>
                                            <tr>
                                              <td>Email : </td>
                                              <td>lokmanhossain@gmail.com</td>
                                            </tr>
                                            <tr>
                                              <td>Present Address : </td>
                                              <td>Adorsho Garej, Khilkhet, Dhaka</td>
                                            </tr>
                                            <tr>
                                              <td>Permanent Address : </td>
                                              <td>Khat Khatia, Rangpur Sadar, Rangpur</td>
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
                    </div>
                </section>
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection