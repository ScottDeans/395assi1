<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	   $users = User::paginate(5);
  return View::make('users.index', compact('users'));//show page
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//checks validation rules
        $input = Input::all();
        $validation = Validator::make($input, User::$rules);

        if ($validation->passes())//if passed create new user form and send back to index
        {
            User::create($input);

            return Redirect::route('users.index');
        }

        return Redirect::route('users.create')//if not send back to create with errors
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
return Redirect::route('users.index');//displays user
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
      $user = User::find($id);//finds the id to edit
        if (is_null($user))
        {
            return Redirect::route('users.index');//if not there return to index
        }
        return View::make('users.edit', compact('user'));//sends to edit views
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
       $input = Input::all();
        $validation = Validator::make($input, User::$rules); //makes sure it passes validation rules
        if ($validation->passes())
        {
            $user = User::find($id);
            $user->update($input);
            return Redirect::route('users.show', $id);//calls shows
        }
return Redirect::route('users.edit', $id)  //send back to edit if there were errors with the rules
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
   User::find($id)->delete();
        return Redirect::route('users.index'); //deletes entry sends back to user
	}


}
