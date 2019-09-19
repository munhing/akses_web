@extends('layouts.app')

@section('content')
    <div id="app">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Portuser Actives</li>
            <li class="breadcrumb-menu d-md-down-none">
                <div class="btn-group" role="group" aria-label="Button group">
                <a class="btn" href="#" @click.prevent="clockInModal">
                    <i class="fa fa-sign-out"></i> Clock In</a>
                </div>
            </li>        
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                @include('flash::message')
                <profile-list></profile-list>
                <clock-in-modal ref="myModal"></clock-in-modal>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

