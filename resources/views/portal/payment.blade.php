@extends('portal.layouts.default')

@section('content')

<div class="stripe-errors panel hide"></div>

<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">您正在购买的TwoVPN的产品</h3>
						</div>
						<div class="panel-body">
							<p>您正在购买TwoVPN的Project Kingston服务，请仔细填写以下资料~</p>
							<p>请注意，TwoVPN有可能（因为技术原因）明文保存您的VPN账号密码（我们不会明文保存您的TwoVPN账号密码），请使用非常用密码作为VPN的密码</p>
							
							<br>

							<form action="{{ url('home/pay') }}" method="POST" role="form" class="form-horizontal" id="PaymentForm">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">


								
								<div class="form-group">
									<label class="col-sm-2 control-label">选择计划</label>
									
									<div class="col-sm-10">
										<select class="form-control" id="price" name="price" >
											<option value="3000">半年套餐 - Half Year $30 USD</option>
											<option value="5000">一年套餐 - One Year $50 USD (半年后可换海龟套餐)</option>
											<option value="9000">两年套餐 - Two Year $90 USD (可随时切换海龟套餐)</option>
											<option value="8800">一年双套餐 - One Year With Project Beijing $88 USD (推荐)</option>
										</select>
									</div>
								</div>

								<div class="form-group-separator"></div>

								<!-- <input type="hidden" name="price" value="1000"/> -->
								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">VPN用户名</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="account" name="account" placeholder="请输入您的VPN用户名">
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-2">VPN密码</label>
									
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password" name="password" placeholder="请输入非常用密码~">
									</div>
								</div>
  								
  								<input type="hidden" id="stripeToken" name="stripeToken"/>
    								<input type="hidden" id="stripeEmail" name="stripeEmail"/>

							</form>
							<input type="button" class="btn btn-primary btn-default" id="customerPayButton" Value="Make Payment">
						</div>
					</div>
					
				</div>
			</div>

@endsection

@section('script')
	<!--<script src="https://js.stripe.com/v2"></script>-->
	<script src="https://checkout.stripe.com/checkout.js"></script>
	<script src="{{{asset('./js/stripe.js')}}}"></script>-
@endsection