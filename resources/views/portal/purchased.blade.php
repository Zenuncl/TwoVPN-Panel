@extends('portal.layouts.default')

			@section('content')
	
			@foreach ($purchaseds as $purchased)

			<div class="row">
				<div class="col-sm-12">
					
					<div class="chart-item-bg-2">
						<div class="chart-item-desc">
							<a href="/home/purchased/{{{ $purchased->id }}}">{{ $purchased->ServiceName }}</a>

						</div>
						<div class="chart-item-env">
							<div id="doughnut-1" style="width: 200px;"></div>
						</div>
					</div>
					
				</div>
			</div>

			@endforeach
			@endsection