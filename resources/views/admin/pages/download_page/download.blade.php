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
                    <a href="{{ URL::to('download/seatplan')}}" class="small-box bg-index-box">
                        <div class="inner">
                            <h4>Seat Plan</h4>

                            <p>Download</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-tags"></i>
                        </div>

                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="{{URL::to('download/admitcard')}}" class="small-box bg-index-box">
                        <div class="inner">
                            <h4>Admin Card</h4>
                            <p>Download</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-id-card-o"></i>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="" class="small-box bg-index-box">
                        <div class="inner">
                            <h4>Resultsheet</h4>

                            <p>Download</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-download"></i>
                        </div>

                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="" class="small-box bg-index-box">
                        <div class="inner">
                            <h4>Student List</h4>

                            <p>Download</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-download"></i>
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