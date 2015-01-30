@extends('layouts.home')
@section('content')

<body>

{{ Form::open(array('url' => 'login')) }}//sends forms to login
<h1>Login</h1>

<!-- if there are login errors, show them here -->
<p>
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}//errors check
</p>

<p>
    {{ Form::label('email', 'Email Address') }}//entry form for email address upon login
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'youraddress@gmail.com')) }}
</p>

<p>
    {{ Form::label('password', 'Password') }}//password field
    {{ Form::password('password') }}
</p>

<p>{{ Form::submit('Submit!') }}</p>//submit closing
{{ Form::close() }}
</body>
@stop
