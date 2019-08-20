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
                <a href="{{ URL::to('student')}}" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>
                            @isset($totalStudent)
                                {{$totalStudent}}
                            @endisset
                        </h3>

                        <p>Students</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>

                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{{ URL::to('class')}}" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>
                            @isset($totalClass)
                                {{$totalClass}}
                            @endisset
                        </h3>

                        <p>Classs</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-briefcase"></i>
                    </div>

                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{{URL::to('section')}}" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>
                            @isset($totalSection)
                                {{$totalSection}}
                            @endisset
                        </h3>

                        <p>Groups/Sec</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>

                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{{ URL::to('subject')}}" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>
                            @isset($totalSubject)
                                {{$totalSubject}}
                            @endisset
                        </h3>

                        <p>Subjects</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-book"></i>
                    </div>

                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{{ URL::to('exam')}}" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>
                            @isset($totalExam)
                                {{$totalExam}}
                            @endisset
                        </h3>

                        <p>Exams</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>

                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Results</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>

                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{{URL::to('download')}}" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Download</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-archive"></i>
                    </div>

                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{{URL::to('account')}}" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Account</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>

                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>13</h3>

                        <p>Config</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-toggle"></i>
                    </div>

                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Config</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-toggle"></i>
                    </div>

                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="" class="small-box bg-index-box">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Config</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-toggle"></i>
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