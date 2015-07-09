@extends('portal.layouts.default')

			@section('content')

			<div class="row">
				<div class="col-sm-12">
					
					<div class="chart-item-bg-2">
						<div class="chart-item-desc">
							{{ $purchased->ServiceName }}
							{{ $purchased->UserName}}

						</div>
						<div class="chart-item-env">
							<div id="doughnut-1" style="width: 200px;"></div>
						</div>
					</div>
					
				</div>
			</div>

			@endsection