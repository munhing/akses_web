@extends('layouts.app')

@section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <dashboard></dashboard>
        </div>
    </div>
</div>
@endsection