		$(document).ready(function() {
			Stripe.setPublishableKey('pk_test_55qsM1PZ5USDOOUeDhdv1GVF');

			$('#paymentForm button').on('click', function(){
				var form = $('#paymentForm');
				var submit = form.find('button');
				var submitInitialText = submit.text();

				submit.attr('disabled', 'disabled').text('Processing your payment...');

				Stripe.card.createToken(form, function(status, response){
					var token;

					if(response.error){
						form.find('.stripe-errors').text(response.error.message).show();
						submit.removeAttr('disabled');
						submit.text(submitInitialText);
					}else{
						token = response.id;
						form.append($('<input type="hidden" name="StripeToken">').val(token));
						form.submit();
						//console.log(response.id);
					}
				});
			});
		});