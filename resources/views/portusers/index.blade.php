@extends('layouts.app')

@section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Portusers</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
             
                 <div class="col-12">
                 @include('portusers.table2')

                  </div>
             </div>
         </div>
    </div>
    
                            
</div>
@endsection

