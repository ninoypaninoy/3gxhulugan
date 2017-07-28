{{ Form::open(['url' => '/customers']) }}
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-title">
					<h5>Inquiry</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-wrench"></i>
						</a>
						<a class="cloase-link">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<form class="wizard-big" role="form" method="POST" id="form" action="#">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-lg-6">
								<form class="form-group{{ $errors->has('first_name') ? 'has-error' : '' }}">
									<label>First name :</label>
									<input id="first_name" type="text" name="first_name" placeholder="First name" class="form-control"  required autofocus>

									@if ($errors->has('first_name'))
			                            <span class="help-block">
			                            	<strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('first_name') }}</strong>
			                            </span>
			                        @endif
								</form>
							</div>
							<div class="col-lg-6">
								<form class="form-group{{ $errors->has('middle_name') ? 'has-error' : '' }}">
									<label>Middle name :</label>
									<input id="middle_name" type="text" name="middle_name" placeholder="Middle name" class="form-control"  required>

									@if ($errors->has('middle_name'))
			                            <span class="help-block">
			                            	<strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('middle_name') }}</strong>
			                            </span>
			                        @endif
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<form class="form-group{{ $errors->has('last_name') ? 'has-error' : '' }}">
									<label>Last name :</label>
									<input id="last_name" type="text" name="last_name" placeholder="Last name" class="form-control"  required>

									@if ($errors->has('last_name'))
			                            <span class="help-block">
			                            	<strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('last_name') }}</strong>
			                            </span>
			                        @endif
								</form>
							</div>
							<div class="col-lg-6">
								<form class="form-group{{ $errors->has('name_extension') ? 'has-error' : '' }}">
									<label>Extension name :</label>
									<input id="name_extension" type="text" name="name_extension" placeholder="Extension name" class="form-control"  required>

									@if ($errors->has('name_extension'))
			                            <span class="help-block">
			                            	<strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('name_extension') }}</strong>
			                            </span>
			                        @endif
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<form class="form-group">
									<label>Birth date :</label>
									<input id="birth_date" type="text" name="birth_date" class="form-control"  required>
								</form>
							</div>
						</div>
						<button type="submit" class="btn btn-primary block full-width m-b" data-syle="zoom-in">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}