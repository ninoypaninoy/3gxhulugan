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
						{{ csrf_field() }}
						<!--Form opening-->
						{!! Form::open(array('route' => 'customers_store', 'class' => 'form')) !!}
							<!--Row opening-->
							<div class="row">
								<div class="col-lg-6">
									<!--Dropdown input for Branch-->
									<div class="form-group{{ $errors->has('first_name') ? 'has-error' : '' }}">
									    {!! Form::label('Branch') !!}
									    {{ Form::select('branch_id', [1 => '3GX Main', 2 => '3GX Legazpi', 3 => '3GX Tabaco', 4 => '3GX Daet'], null, ['class' => 'form-control']) }}

									        @if ($errors->has('branch_id'))
				                            <span class="help-block">
				                            	<strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('branch_id') }}</strong>
				                            </span>
				                        @endif
									
									</div>
									<!--Dropdown end-->
								</div>
							</div>
							<!--Row closing-->
							<!--Row opening-->
							<div class="row">
								<div class="col-lg-6">
									<!--Input field for first_name-->
									<div class="form-group{{ $errors->has('first_name') ? 'has-error' : '' }}">
									    {!! Form::label('First name') !!}
									    {!! Form::text('first_name', null, array('required', 'class'=>'form-control', 'placeholder'=>'First name')) !!}

									        @if ($errors->has('first_name'))
				                            <span class="help-block">
				                            	<strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('first_name') }}</strong>
				                            </span>
				                        @endif
									
									</div>
									<!--Input field end-->
								</div>
								<div class="col-lg-6">
									<!--Input field for middle_name-->
									<div class="form-group{{ $errors->has('middle_name') ? 'has-error' : '' }}">
									    {!! Form::label('Middle name') !!}
									    {!! Form::text('middle_name', null, array('class'=>'form-control', 'placeholder'=>'First name')) !!}

									        @if ($errors->has('middle_name'))
				                            <span class="help-block">
				                            	<strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('middle_name') }}</strong>
				                            </span>
				                        @endif
									
									</div>
									<!--Input field end-->
								</div>
							</div>
							<!--Row closing-->
							<!--Row opening-->
							<div class="row">
								<div class="col-lg-6">
									<!--Input field for last_name-->
									<div class="form-group{{ $errors->has('last_name') ? 'has-error' : '' }}">
									    {!! Form::label('Last name') !!}
									    {!! Form::text('last_name', null, 
									        array('required', 
									              'class'=>'form-control', 
									              'placeholder'=>'Last name')) !!}

									        @if ($errors->has('last_name'))
				                            <span class="help-block">
				                            	<strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('last_name') }}</strong>
				                            </span>
				                        @endif
									
									</div>
									<!--Input field end-->
								</div>
								<div class="col-lg-6">
									<!--Input field for name_extension-->
									<div class="form-group{{ $errors->has('name_extension') ? 'has-error' : '' }}">
									    {!! Form::label('Extension name') !!}
									    {!! Form::text('name_extension', null, array('class'=>'form-control', 'placeholder'=>'Extension name')) !!}

									        @if ($errors->has('name_extension'))
				                            <span class="help-block">
				                            	<strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('name_extension') }}</strong>
				                            </span>
				                        @endif
									
									</div>
									<!--Input field end-->
								</div>
							</div>
							<!--Row closing-->
							<!--Row opening-->
							<div class="row">
								<div class="col-lg-6">
									<!--Input field for birth_date-->
									<div class="form-group{{ $errors->has('birth_date') ? 'has-error' : '' }}">
									    {!! Form::label('Birth date') !!}
									    {!! Form::text('birth_date', null, array('required', 'class'=>'form-control', 'placeholder'=>'Birth name')) !!}

									        @if ($errors->has('birth_date'))
				                            <span class="help-block">
				                            	<strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('birth_date') }}</strong>
				                            </span>
				                        @endif
									
									</div>
									<!--Input field end-->
								</div>
							</div>
							<!--Row closing-->
							<!--Row opening-->
							<!--Submit form-->
							<div class="form-group">
							    {!! Form::submit('Submit', array('class'=>'btn btn-primary block full-width m-b', 'data-syle'=>'zoom-in')) !!}
							</div>
							<!--Submit form end-->
						{!! Form::close() !!}
						<!--Form closing-->
					
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}