@extends('layouts.app')

@section('content')
    <div id="app">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Active Visitors</li>
            <li class="breadcrumb-menu">
                <div class="btn-group" role="group" aria-label="Button group">
                    <b-form inline>
                        <label class="sr-only" for="inline-form-input-name">Filter</label>
                        <b-input
                        id="inline-form-input-name"
                        class="mb-2 mr-sm-2 mb-sm-0"
                        placeholder="Filter List"
                        v-model="search"
                        ></b-input>
                    </b-form>
                    <a class="btn" href="#" @click.prevent="visitorRegistrationModal">
                        Visitor Registration
                    </a>                    
                    <a class="btn" href="#" @click.prevent="visitorClockInModal">
                        <i class="fa fa-sign-out"></i> Clock In
                    </a>
                </div>
            </li>        
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                @include('flash::message')
                <visitor-list></visitor-list>
                <visitor-clock-in-modal ref="myVisitorModal"></visitor-clock-in-modal>
                <visitor-registration-modal ref="myVisitorRegistrationModal"></visitor-registration-modal>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection