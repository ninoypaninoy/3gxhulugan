@extends('layouts.master')

@section('title', ' Inquiry List')

@section('page-content')
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-md-12">
        <h2>Here are list of Inquiry</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ url('/customers/inquirylist') }}">Inquiry List</a>
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
                        <div class="ibox-content">
                            <div id="loader">
                                <div class="sk-spinner sk-spinner-chasing-dots">
                                    <div class="sk-dot1"></div>
                                    <div class="sk-dot2"></div>
                                </div><br>
                            <h3 class="text-center">Loading Table...</h3>
                            </div>
                            <div class="table-responsive">
                                <!-- begin table -->
                                <table class="table table-striped table-bordered table-hover animated fadeIn" id="customers-table" style="display:none" >
                                    <thead>
                                        <tr>
                                            <th>First name</th>
                                            <th>Middle name</th>
                                            <th>Last name</th>
                                            <th>Extension name</th>
                                            <th>Birth date</th>
                                            <th>Branch</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>First name</th>
                                            <th>Middle name</th>
                                            <th>Last name</th>
                                            <th>Extension name</th>
                                            <th>Birth date</th>
                                            <th>Branch</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                    <!-- end table -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- scripts that are only loaded in this page --}}
@push('scripts')
<script>

//load this scripts after page load
$(document).ready(function() {

    //customers table
    var table = $('#customers-table').DataTable({
        processing: true,                               //
        serverSide: true,                               //
        responsive: true,                               //
        ajax: '{!! route('customers.getinquirylist') !!}',  //feed data from this ajax
        //custom button definition
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        //buttons 
        buttons: [
            { 
            text: '<i class="fa fa-refresh"></i> Refresh',
                action: function ( e, dt, node, config ) {

                    //reload the table from the server
                    dt.ajax.reload();

                } //end action

            }, //end button
            {
            text: '<i class="fa fa-check-square"></i> Select Multiple',
                action: function ( e, dt, node, config ) {


                } //end action

            } //end button definition //end button definition

        ], //end button definition
        
        //column definition
        columns: [
            { data: 'first_name', name: 'first_name' },
            { data: 'middle_name', name: 'middle_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'name_extension', name: 'name_extension'},
            { data: 'birth_date', name: 'birth_date'},
            { data: 'branch_id', name: 'branch_id'}
        ],
        language: {
            "processing": "Loading",
            "thousands": ",",
            "zeroRecords": "No matching customers found. Please check your spelling or try refreshing the table and try again."
        }

    }); //end datatable initialization0

    $('#customers-table').fadeIn();
    $('#loader').hide();

    //when the user clicks the refresh button the data must be refreshed
    $("#Refresh").click(function (e) { 
        table.draw();   
    });

});

</script>
@endpush