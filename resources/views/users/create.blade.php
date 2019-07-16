{!! Form::model($user, ['url' => route('user-store') ]) !!}
  @include('users.form')
  {!! Form::submit('Save user',['class'=>'form-control btn btn-primary']) !!}
{!! Form::close() !!}
