@extends('layouts.app')

@section('content')
    <div id="app">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Portuser Actives</li>
            <li class="breadcrumb-menu d-md-down-none">
                <div class="btn-group" role="group" aria-label="Button group">
                    <b-form inline>
                        <label class="sr-only" for="inline-form-input-name">Fliter</label>
                        <b-input
                        id="inline-form-input-name"
                        class="mb-2 mr-sm-2 mb-sm-0"
                        placeholder="Filter List"
                        v-model="search"
                        ></b-input>
                    </b-form>
                    <a class="btn" href="#" @click.prevent="clockInModal">
                        <i class="fa fa-sign-out"></i> Clock In
                    </a>
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

