		// $(document).ready(function() {
		// 	Stripe.setPublishableKey('pk_test_55qsM1PZ5USDOOUeDhdv1GVF');

		// 	$('#paymentForm button').on('click', function(){
		// 		var form = $('#paymentForm');
		// 		var submit = form.find('button');
		// 		var submitInitialText = submit.text();

		// 		submit.attr('disabled', 'disabled').text('Processing your payment...');

		// 		Stripe.card.createToken(form, function(status, response){
		// 			var token;

		// 			if(response.error){
		// 				form.find('.stripe-errors').text(response.error.message).show();
		// 				submit.removeAttr('disabled');
		// 				submit.text(submitInitialText);
		// 			}else{
		// 				token = response.id;
		// 				form.append($('<input type="hidden" name="StripeToken">').val(token));
		// 				form.submit();
		// 				//console.log(response.id);
		// 			}
		// 		});
		// 	});
		// });

		var handler = StripeCheckout.configure({
			key: 'pk_test_55qsM1PZ5USDOOUeDhdv1GVF',
			image: '/img/documentation/checkout/marketplace.png',
			token: function(token) {
				$("#stripeToken").val(token.id);
				$("#stripeEmail").val(token.email);
				$("#PaymentForm").submit();
			}
		});

		$('#customerPayButton').on('click', function(e) {
			var amount = $("#price").val();
			// Open Checkout with further options
			
			handler.open({
				name: 'TwoVPN.com 支付平台',
				description: '您正在TwoVPN支付购买某VPN服务',
				amount: amount,
				bitcoin: true,
				alipay: true
			});
			e.preventDefault();
		});

		// Close Checkout on page navigation
		$(window).on('popstate', function() {
			handler.close();
		});