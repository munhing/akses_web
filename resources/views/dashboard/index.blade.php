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
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body pb-0">
                                <div class="text-value larger">56</div>
                            </div>
                            <div class="card-bg-icon-portusers mt-3 mx-3" style="height:50px;">
                                <div class="text-uppercase large">Port Users</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body pb-0">
                                <div class="text-value larger">34</div>
                            </div>
                            <div class="card-bg-icon-vehicles mt-3 mx-3" style="height:50px;">
                                <div class="text-uppercase large">Vehicles</div>
                            </div>
                        </div>
                    </div>    
                    
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body pb-0">
                                <div class="text-value larger">12</div>
                            </div>
                            <div class="card-bg-icon-visitors mt-3 mx-3" style="height:50px;">
                                <div class="text-uppercase large">Visitors</div>
                            </div>
                        </div>
                    </div>                     
                </div>
            </div>
        </div>
    </div>
@endsection

