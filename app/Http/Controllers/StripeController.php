<?php

namespace App\Http\Controllers;

class StripeController extends Controller
{
    public function prepareCheckout()
    {
         $storage = \App::make('payum')->getStorage('Payum\Core\Model\ArrayObject');

         $details = $storage->create();
         $details['amount'] = '100';
         $details['currency'] = 'USD';
         $details['description'] = 'a desc';
         $storage->update($details);

         $captureToken = \App::make('payum.security.token_factory')->createCaptureToken('stripe_checkout', $details, 'payment_done');

         return \Redirect::to($captureToken->getTargetUrl());
    }
}