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
							{{ csrf_field() }}
							<!--Row opening-->
							<div class="row">
								<div class="col-lg-6">
									<!--Input field for first_name-->
									<div class="form-group{{ $errors->has('first_name') ? 'has-error' : '' }}">
									    {!! Form::label('First name') !!}
									    {!! Form::text('first_name', null, array('class'=>'form-control', 'placeholder'=>'First name', 'value'=>"{{ old('first_name') }}")) !!}

									    @if ($errors->has('first_name'))
				                            <span class="help-block" style="color:#f14232;">
				                            	<strong><i class="fa fa-exclamation-triangle" style="color:#F14232;"></i> {{ $errors->first('first_name') }}</strong>
				                            </span>
				                        @endif
									
									</div>
									<!--Input field end-->
								</div>
								<div class="col-lg-6">
									<!--Input field for middle_name-->
									<div class="form-group{{ $errors->has('middle_name') ? 'has-error' : '' }}">
									    {!! Form::label('Middle name') !!}
									    {!! Form::text('middle_name', null, array('class'=>'form-control', 'placeholder'=>'Middle name')) !!}

									    @if ($errors->has('middle_name'))
				                            <span class="help-block" style="color:#F14232;">
				                            	<strong><i class="fa fa-exclamation-triangle" style="color:#F14232;"></i> {{ $errors->first('middle_name') }}</strong>
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
									    {!! Form::text('last_name', null, array('class'=>'form-control', 'placeholder'=>'Last name')) !!}

									       @if ($errors->has('last_name'))
				                            <span class="help-block" style="color:#F14232;">
				                            	<strong><i class="fa fa-exclamation-triangle" style="color:#F14232;"></i> {{ $errors->first('last_name') }}</strong>
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
				                            <span class="help-block" style="color:#F14232;">
				                            	<strong><i class="fa fa-exclamation-triangle" style="color:#F14232;"></i> {{ $errors->first('name_extension') }}</strong>
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
									<div class="form-group" id="data_3">
										{!! Form::label('Birth date') !!}
		                                <!--<label class="font-normal">Decade view</label>-->
		                                <div class="input-group date">
		                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		                                    	{!! Form::text('birth_date', null, array('class'=>'form-control', 'placeholder'=>'Birth date')) !!}
		                                    	<input type="text" class="form-control" value="10/11/2013">
		                                </div>
		                            </div>
									
									<!--Input field end-->
								</div>
								<div class="col-lg-6">
									<!--Dropdown input for Branch-->
									<div class="form-group{{ $errors->has('first_name') ? 'has-error' : '' }}">
									    {!! Form::label('Branch') !!}
									    {!! Form::select('branch_id', [1 => '3GX Main', 2 => '3GX Legazpi', 3 => '3GX Tabaco', 4 => '3GX Daet'], null, ['class' => 'form-control']) !!}

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
@push('scripts')
	<script type="text/javascript">
        $('#data_3 .input-group.date').datepicker({
                format: 'yyyy/mm/dd',
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
    </script>
@endpush