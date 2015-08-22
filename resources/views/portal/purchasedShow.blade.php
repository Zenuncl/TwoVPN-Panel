@extends('portal.layouts.default')

@section('content')

            <div class="row">
		<div class="col-lg-6">
                      	<section class="panel">
                          	<header class="panel-heading">
                              	Service Information / 服务简介
                          	</header>
                          	
                          	<div class="panel-body">
			<div class="from-group">
                          	Description: {{ $purchased->ServiceName }}
			</div>
			<br>
			<div class="from-group">
			Status: Online
			</div>
			<br>
			<div class="from-group">
			Traffic Quota: 30 GB Monthly  (非死限定)
			</div>
			<br>
			<div class="from-group">
			Billing Cycle: Yearly
			</div>
			<br>
                      	</section>
                 	</div>

                 	<div class="col-lg-6">
                      	<section class="panel">
                          	<header class="panel-heading">
                              	Invoice(s) - Other Information / 账单和其他信息
                          	</header>
                          	
                          	<div class="panel-body">
			Coming soon
                          	</div>
                      	</section>
                 	</div>
            </div>

            <div class="row">
            	<div class="col-lg-12">
            		<section class="panel">
            			<header class="panel-heading">
            				Detail Service Information / 服务详情
            			</header>

				<div class="panel-body">
					<div class="from-group">
					Username: {{ $purchased->UserName}}
					</div>
					<br>
					<div class="from-group">
					PassWord: (保密，MD5加密)
		                          	</div>
				</div>
            		</section>
            	</div>
            </div>

@endsection