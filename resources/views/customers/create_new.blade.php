@extends('layouts.master')

@section('title', '3GX Hulugan | Inquiry Form')

@section('page-content')
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-md-12">
        <h2>Create New</h2>
        <ol class="breadcrumb">
	        <li class="active">
	            <a href="{{ url('home') }}">Home</a>
	        </li>
        </ol>
    </div>
</div>
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Create new</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            

                            <form id="form" action="#" class="wizard-big">
                                <h1>Customer Information</h1>
                                <fieldset>
                                    <h2>General Information</h2>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>First name *</label>
                                                <input id="first_name" name="first_name" type="text" placeholder="First name" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Middle name</label>
                                                <input id="middle_name" name="middle_name" type="text" placeholder="Middle name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Last name *</label>
                                                <input id="last_name" name="last_name" type="text" placeholder="Last name" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Extension name</label>
                                                <input id="name_extension" name="name_extension" type="text" placeholder="Extension name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Birth date *</label>
                                                <input id="birth_date" name="birth_date" type="text" placeholder="Birth date" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Information</h1>
                                <fieldset>
                                    <h2>Additional Information</h2>
                                    <div class="hr-line-dashed"></div>
                                    <div class="row">
                                    	<!--<div class="col-lg-12">
	                                    	<div class="form-group">
	                                    		<label class="control-label">Inline checkboxes</label><br>
			                                    <div class="col-sm-10">
			                                    	<label class="checkbox-inline"> <input type="checkbox" value="option1" id="inlineCheckbox1"> Inquirer </label>
			                                    	<label class="checkbox-inline"><input type="checkbox" value="option2" id="inlineCheckbox2"> Applicant </label>
			                                    	<label class="checkbox-inline"><input type="checkbox" value="option3" id="inlineCheckbox3"> Borrower </label>
			                                        <label class="checkbox-inline"><input type="checkbox" value="option3" id="inlineCheckbox3"> Fully paid </label>
			                                    </div>
			                                </div>
			                            </div>-->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Street number *</label>
                                                <input id="street_no" name="street_no" type="text" placeholder="#" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Barangay *</label>
                                                <input id="barangay" name="barangay" type="text" placeholder="Barangay" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            
                                            <div class="form-group">
                                                <label>Street *</label>
                                                <input id="street" name="street" type="text" placeholder="Street" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Municipality *</label>
                                                <input id="municipality" name="municipality" type="text" placeholder="Municipality" class="form-control required">
                                            </div>
                                    	</div>
                                    	<div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Zipcode *</label>
                                                <input id="zip-code" name="zip-code" type="text" placeholder="Zipcode" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        	<div class="form-group">
                                                <label>Years of stay *</label>
                                                <input id="years_of_stay" name="years_of_stay" type="text" placeholder="Years of stay" class="form-control required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="row">
                                    	<div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Gender *</label>
                                                <select class="form-control m-b" name="account">
			                                        <option>Male</option>
			                                        <option>Female</option>
			                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Civil status *</label>
                                                <select class="form-control m-b" name="account">
			                                        <option>Single</option>
			                                        <option>Married</option>
			                                        <option>Widowed</option>
			                                        <option>Divorced</option>
			                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Contact number *</label>
                                                <input id="contact_no" name="contact_no" type="text" placeholder="Contact number" class="form-control required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="row">
                                    	<label>Remarks</label>
                                    	<textarea id="encoder_remarks" type="textarea" name="encoder_remarks" placeholder="Remarks..." class="form-control"></textarea>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
@endsection

@push('scripts')

<script>
$(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
</script>
@endpush