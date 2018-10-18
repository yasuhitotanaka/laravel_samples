@extends('layouts.app')

@section('content')
  <h1>{{ $photo->title }}</h1>
  <p>{{ $photo->description }}</p>
  <a href="/photoshow/public/albums/{{ $photo->album_id }}">Back to Gallery</a>
  <hr>
  <img src="/photoshow/storage/app/public/photos/{{ $photo->album_id }}/{{ $photo->photo }}"
   alt="{{ $photo->title }}">
   <br><br>
  {!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete Photo', ['class' => 'button alert']) }}
  {!! Form::close() !!}
  <hr>
  <small>Size: {{ $photo->size }}</small>
@endsection
