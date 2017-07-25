@extends('layouts.master')

@section('title', '3GX Hulugan | Home')

@section('page-content')
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-md-12">
                <h2>{{ $greetings }}</h2>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="{{ url('home') }}">Home</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Row Header</h5>
                                </div>
                                <div class="ibox-content">
                                    <div>   
                                        <p>Row Content</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection