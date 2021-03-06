<?php
use Auth;
class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
*/
public function showWelcome()
	{
		return View::make('hello');
	}

public function showLogin()
{
    // show the form
    return View::make('login');//when login send forms
}

public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:6' // password can only be alphanumeric and has to be greater than 6 characters
		);
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} 
		else {
			// create our user data for the authentication
			$user = array(
			'password' 	=> Input::get('password'),
			'email' 	=> Input::get('email')
			
			);
			// attempt to do the login
			if (Auth::basic($user)) {
				// validation successful!
				 return Redirect::route('users.index');
			} else {
				// validation not successful, send back to form
				return Redirect::to('login');
				//echo 'loss!';
				//print_r(array_values($user));
			}
		}
	}
}

