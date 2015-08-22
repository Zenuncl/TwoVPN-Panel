@extends('portal.layouts.default')

			@section('content')
			<div class="row">
				<div class="col-sm-12">
					
					<div class="chart-item-bg-2">
						<div class="chart-item-desc">
							<p>八月份的服务将为内测免费赠送，您所购买的半年或者一年的服务将自动延长一个月。</p>
							<p>所有现有服务将提供7天无条件退款，如果您对于我们的服务不满意，可以联系我们解决。</p>
							<p>请在内测信用卡付款处输入卡号4242 4242 4242 4242进行测试购买，支付宝（Alipay）和 Bitcoin付款将自动进行。</p>
						</div>
						<div class="chart-item-env">
							<div id="doughnut-1" style="width: 200px;"></div>
						</div>
					</div>
					
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-6">
					
					<div class="panel panel-default">
						<div class="panel-heading">Project Kingston</div>
						<p> 本服务提供您在国内访问国外网站例如Facebook，Twitter，YouTube等</p>
						<p> 本服务现在由AnyConnect提供技术支持，稍后将支持IPSec VPN，Pac自动路由等</p>
						<p> 本服务提供7天无条件退款</p>
						<br>
						<a href="{{route('payment')}}" class="btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right">
							<i class="fa-plane"></i>
							<span>立即起航</span>
						</a>
					</div>
					
				</div>
				<div class="col-sm-6">
					
					<div class="panel panel-default">
						<div class="panel-heading">Project Beijing</div>
						<p> 本服务提供您在国外访问国内网站例如优酷土豆，爱奇艺等的加速服务</p>
						<p> 本服务现在由暂定由AnyConnect提供技术支持。本服务将于9-10月左右上线内测。</p>
						<p> 本服务提供7天无条件退款</p>
						<br>
						<a href="#" class="btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right">
							<i class="fa-plane"></i>
							<span>Coming Soon</span>
						</a>
					</div>
					
				</div>
			</div>
			@endsection