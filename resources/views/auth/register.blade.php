@extends('layouts.default')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><?= Lang::get('twovpn.register'); ?></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/user/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label"><?= Lang::get('twovpn.name'); ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"><?= Lang::get('twovpn.email'); ?></label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"><?= Lang::get('twovpn.password'); ?></label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"><?= Lang::get('twovpn.passwdComfirm'); ?></label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"><?= Lang::get('twovpn.invitCode'); ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="invitation_code">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"><?= Lang::get('twovpn.recaptcha'); ?></label>
							<div class="col-md-6">
								{!! Recaptcha::render() !!}
							</div>
						</div>	

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<?= Lang::get('twovpn.register'); ?>
								</button>
								<a href="{{route('index')}}" class="btn btn-primary"><?= Lang::get('twovpn.cancel'); ?></a>
							</div>
							<div class="col-md-6 col-md-offset-4">
								<a class="btn btn-link" href="{{ url('/auth/login') }}"><?= Lang::get('twovpn.haveAcc'); ?></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
