@extends("admin.layout.layout")
@section("body")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="{{ URL::to('student/create')}}" class="small-box bg-index-box">
                        <div class="inner">
                            <h4>New</h4>

                            <p>Students</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="{{URL::to('student/view')}}" class="small-box bg-index-box">
                        <div class="inner">
                            <h4>List</h4>
                            <p>Student</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list-alt"></i>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="" class="small-box bg-index-box">
                        <div class="inner">
                            <h4>UP</h4>

                            <p>Student</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-upload"></i>
                        </div>

                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="" class="small-box bg-index-box">
                        <div class="inner">
                            <h4>Chart</h4>

                            <p>Student</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-recycle"></i>
                        </div>

                    </a>
                </div>
                <!-- ./col -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection