@extends('layouts.app')

@section('links')
    <link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('portusers.index') !!}">Portuser</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit Portuser</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($portuser, ['route' => ['portusers.update', $portuser->id], 'method' => 'patch', 'enctype'=>'multipart/form-data', 'id' => 'data-form']) !!}

                              @include('portusers.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection

@section('myscripts')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
@endsection