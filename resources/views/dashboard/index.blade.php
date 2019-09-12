@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
            <div class="row">
                 <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="card text-white bg-info">
                            <div class="card-body">
                                <div class="h1 text-muted text-right mb-4">
                                <i class="icon-people"></i>
                                </div>
                                <div class="text-value">56</div>
                                <small class="text-muted text-uppercase font-weight-bold">Portusers</small>
                                <div class="progress progress-white progress-xs mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-sm-6 col-md-6">
                            <div class="card text-white bg-success">
                            <div class="card-body">
                                <div class="h1 text-muted text-right mb-4">
                                <i class="icon-user-follow"></i>
                                </div>
                                <div class="text-value">385</div>
                                <small class="text-muted text-uppercase font-weight-bold">Vehicles</small>
                                <div class="progress progress-white progress-xs mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="brand-card">
                                <div class="brand-card-header bg-facebook">
                                    <i class="icon-people"></i>
                                    <div class="chart-wrapper">
                                        <canvas id="social-box-chart-1" height="90"></canvas>
                                    </div>
                                </div>
                                <div class="brand-card-body">
                                    <div>
                                        <div class="text-value">89k</div>
                                        <div class="text-uppercase text-muted small">friends</div>
                                    </div>
                                    <div>
                                        <div class="text-value">459</div>
                                        <div class="text-uppercase text-muted small">feeds</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

