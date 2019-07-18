{{-- @extends('layouts.app') --}}
<div class ="form-group-row">
    {!! Form::label('firstname', 'First name', ['class' => 'col-sm-6']) !!}
    <div class ="col-sm-6">
        {!! Form::text('firstname', $user->firstname, ['class' => "form-control", 'id' => 'firstname']) !!}
    </div>
</div>

<div class ="form-group-row">
        {!! Form::label('lastname', 'Last name', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('lastname', $user->lastname, ['class' => 'form-control', 'id' => 'lastname']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('email', 'Email', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('email', $user->email, ['class' => 'form-control', 'id' => 'email']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('address', 'Address', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('address', $user->address, ['class' => 'form-control', 'id' => 'address']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('dateofbirth', 'Date of birth', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::date('dateofbirth', $user->dateofbirth, ['class' => 'form-control', 'id' => 'dateofbirth']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('contactnumber', 'Contact number', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('contactnumber', $user->contactnumber, ['class' => 'form-control', 'id' => 'contactnumber']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('subscription_id', 'Subscription', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::select('subscription_id', [1 => 'Monthly - £10', 2 => 'Annual - £120'], $user->subscription_id , ['class' => 'form-control', 'id' => 'subscription_id']) !!}
        </div>
</div>


@presence('ipsum')
<div class ="form-group-row">
        {!! Form::label('password', 'Password', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('password', null, ['class' => 'form-control', 'id' => 'password']) !!}
        </div>
</div>

<div class="form-group row">
        {!! Form::label('password-confirm', 'Confirm Password', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('password', null, ['enctype' => 'enctype="multipart/form-data"', 'class' => 'form-control', 'id' => 'password-confirm', 'name' => 'password_confirmation']) !!}
        </div>
    </div>
@endpresence





