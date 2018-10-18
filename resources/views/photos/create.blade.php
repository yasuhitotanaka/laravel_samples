@extends('layouts.app')

@section('content')
  <h3>Create Album</h3>
  {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{ Form::text('title'), '', ['placeholder' => 'Photo Title'] }}
    {{ Form::text('description'), '', ['placeholder' => 'Photo Description'] }}
    {{ Form::hidden('album_id', $album_id) }}
    {{ Form::file('photo') }}
    {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}
@endsection
