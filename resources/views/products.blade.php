@extends('layouts.master')

@section('title', '3GX Hulugan | Products')

@section('page-content')
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-md-12">
        <h2>Here are list of Products</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ url('products') }}">Products</a>
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
                            <h3 class="text-center">Loading Products</h3>
                            </div>
                            <div class="table-responsive">
                                <!-- begin table -->
                                <table class="table table-striped table-bordered table-hover animated fadeIn" id="products-table" style="display:none" >
                                    <thead>
                                        <tr>
                                            <th>Item No</th>
                                            <th>Item Description</th>
                                            <th>Item Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Item No</th>
                                        <th>Item Description</th>
                                        <th>Item Price</th>
                                        <th>Action</th>
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

{{-- scripts only for this page for client-side processing --}}
@push('scripts')
<script>

//load this scripts after page load
$(document).ready(function() {

    //products table
    var table = $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{!! route('products.getproducts') !!}', //refer to 
        //custom button definition
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp", //this will custom define the header of the table
        //buttons 
        buttons: [
                    {
                    text: '<i class="fa fa-refresh"></i> Refresh',
                    action: function ( e, dt, node, config ) {

                        //reload the table from the server
                        dt.ajax.reload();

                        } //end action

                    },
                                        {
                    text: '<i class="fa fa-refresh"></i> Select',
                    action: function ( e, dt, node, config ) {

                        //reload the table from the server
                        dt.ajax.reload();

                        } //end action

                    } //end button definition //end button definition

        ], //end button definition
        
        //column definition
        columns: [
            { data: 'Item_No', name: 'Item_No',
                "render": function(data, type, full, meta) {

                            if (type === 'display') {
                                Item_No = data;
                                data = data +   '<div class="inline-action-view  animated fadeIn">' +
                                                '<a href="inquiry-item/id='+ Item_No +'" ") }}" ><i class="fa fa-shopping-cart"></i><strong> ADD to INQUIRY</strong></a>' +
                                            '</div>';
                            }
                            return data;
                        }
            },
            { data: 'Item_Desc', name: 'Item_Desc' },
            { data: 'Item_Price', name: 'Item_Price' },
            { data: 'Item_No', name: 'Item_No'},

        ],
        language: {
            "processing": "Loading",
            "thousands": ",",
            "zeroRecords": "No matching products found. Please check your spelling or try refreshing the table and try again."
        }

    }); //end datatable initialization0

    $('#products-table').fadeIn();
    $('#loader').hide();

    //when the user clicks the refresh button the data must be refreshed
    $("#Refresh").click(function (e) { 
        table.draw();   
    });

});

</script>
@endpush