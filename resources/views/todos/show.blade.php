@extends('layouts.app')

@section('content')
  <a class="btn btn-secondary" href="/todolist/public">Go Back</a>
  <h1><a href="/todolist/public/todo/{{$todo->id}}">{{ $todo->text }}</a></h1>
  <div class="badge badge-danger" style="width: 100px; font-size: 12px;">
    {{ $todo->due }}
  </div>
  <hr>
  <p>{{ $todo->body }}</p>
  <br><br>
  <a href="/todolist/public/todo/{{$todo->id}}/edit"
    class="btn btn-secondary">Edit</a>
  {!! Form::open(
    ['action' => ['TodosController@destroy', $todo->id],
        'method' => 'POST', 'class' => 'float-right']) !!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger']) }}
  {!! Form::close() !!}
@endsection
