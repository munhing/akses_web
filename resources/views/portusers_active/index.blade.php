@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Portuser Actives</li>
    </ol>
    <div class="container-fluid" id="app">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                @include('portusers_active.table2')

             </div>
         </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

