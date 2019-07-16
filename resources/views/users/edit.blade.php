{!! Form::model($user, ['url' => route('user-update', ['id' => $user->id])]) !!}
{{ method_field('PATCH') }}
@include('users.form')
{!! Form::submit('Update customer', ['class' => 'form-control btn btn-primary']) !!}
{!! Form::close() !!}
