@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Portuser
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($portuser, ['route' => ['portusers.update', $portuser->id], 'method' => 'patch']) !!}

                        @include('portusers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection