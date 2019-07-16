<div class ="form-group-row">
    {!! Form::label('firstname', 'First name', ['class' => 'col-sm-6']) !!}
    <div class ="col-sm-6">
        {!! Form::text('firstname', null, ['class' => 'form-control', 'id' => 'firstname']) !!}
    </div>
</div>

<div class ="form-group-row">
        {!! Form::label('lastname', 'Last name', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('lastname', null, ['class' => 'form-control', 'id' => 'lastname']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('email', 'Email', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('address', 'Address', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('dateofbirth', 'Date of birth', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('dateofbirth', null, ['class' => 'form-control', 'id' => 'dateofbirth']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('contactnumber', 'Contact number', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('contactnumber', null, ['class' => 'form-control', 'id' => 'contactnumber']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('subscription', 'Subscription', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::select('Subscription', ['Monthly', 'Annual'], "Monthly", ['class' => 'form-control', 'id' => 'subscription', 'placeholder' => 'Pick a subscription...']) !!}
        </div>
</div>

<div class ="form-group-row">
        {!! Form::label('password', 'Password', ['class' => 'col-sm-6']) !!}
        <div class ="col-sm-6">
            {!! Form::text('password', null, ['class' => 'form-control', 'id' => 'password']) !!}
        </div>
</div>




