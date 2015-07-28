@extends('portal.layouts.default')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			
		<div class="chart-item-bg-2">
		<div class="chart-item-desc">
			<table class="table table-striped table-advance table-hover">
                              		<thead>
                              		<tr>
                                  			<th><i class="fa fa-bullhorn"></i> Services</th>
                                  			<th class="hidden-phone"><i class="fa fa-key"></i> Account Username</th>
                                  			<th><i class="fa fa-calendar"></i> Expriery Date</th>
                                  			<th><i class="fa fa-rocket"></i> Status</th>
                                  			<th></th>
                              		</tr>
                              		</thead>
                              		<tbody>

				@foreach ($purchaseds as $purchased)
                              		<tr>
		                                  <td><a href="/home/purchased/{{{ $purchased->id }}}">{{ $purchased->ServiceName }}</a></td>
		                                  <td class="hidden-phone">{{ $purchased->UserName }}</td>
		                                  <td>2015-08-31</td>
		                                  <td><span class="label label-info label-mini">Online</span></td>
		                                  <td>
                                      		<a href="/home/purchased/{{{ $purchased->id }}}" type="button" class="btn btn-red btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                  		</td>
                              		</tr>
                              		@endforeach

                             		 </tbody>
                       		 </table>

		</div>
		
		<div class="chart-item-env">
			<div id="doughnut-1" style="width: 200px;"></div>
		</div>
		</div>
					
		</div>
	</div>
@endsection