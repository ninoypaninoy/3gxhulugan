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
                <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                
                                <div class="ibox-content">
                                    <div>   
                                        <form id="example-form" action="#">
										    <div>
										        <h3>Account</h3>
										        <section>
										            <label for="first_name">First Name *</label>
										            <input id="first_name" name="first_name" type="text" placeholder="First Name" class="required">
										            <label for="middle_name">Middle Name *</label>
										            <input id="middle_name" name="middle_name" type="text" placeholder="Middle Name" class="required">
										            <label for="last_name">Last Name *</label>
										            <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="required">
										            <label for="name_extension">Extension Name *</label>
										            <input id="name_extension" type="text" name="name_extension" placeholder="Extension Name">
										        </section>
										        <h3>Profile</h3>
										        <section>
										            <label for="name">First name *</label>
										            <input id="name" name="name" type="text" class="required">
										            <label for="surname">Last name *</label>
										            <input id="surname" name="surname" type="text" class="required">
										            <label for="email">Email *</label>
										            <input id="email" name="email" type="text" class="required email">
										            <label for="address">Address</label>
										            <input id="address" name="address" type="text">
										            <p>(*) Mandatory</p>
										        </section>
										        <h3>Hints</h3>
										        <section>
										            <ul>
										                <li>Foo</li>
										                <li>Bar</li>
										                <li>Foobar</li>
										            </ul>
										        </section>
										        <h3>Finish</h3>
										        <section>
										            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
										        </section>
										    </div>
										</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('scripts')
<script>
	var form = $("#example-form");
	form.validate({
	    errorPlacement: function errorPlacement(error, element) { element.before(error); },
	    rules: {
	        confirm: {
	            equalTo: "#password"
	        }
	    }
	});

	form.children("div").steps({
	    headerTag: "h3",
	    bodyTag: "section",
	    transitionEffect: "slideLeft",
	    onStepChanging: function (event, currentIndex, newIndex)
	    {
	        form.validate().settings.ignore = ":disabled,:hidden";
	        return form.valid();
	    },
	    onFinishing: function (event, currentIndex)
	    {
	        form.validate().settings.ignore = ":disabled";
	        return form.valid();
	    },
	    onFinished: function (event, currentIndex)
	    {
	        alert("Submitted!");
	    }
	});
</script>
@endpush