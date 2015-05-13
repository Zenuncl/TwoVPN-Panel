<?php 

namespace App\Http\Controllers;

class AboutUsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| About Us (Include Service Discription)  Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function about()
	{
		return view('home');
	}

	public function vpnService()
	{
		return view('home');
	}

	public function ssService()
	{
		return view('home');
	}

}
