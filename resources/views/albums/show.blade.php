@extends('layouts.app')

@section('content')
  <h1>{{ $album->name }}</h1>
  <a href="/photoshow/public/" class="button secondary">Go Back</a>
  <a href="/photoshow/public/photos/create/{{ $album->id }}" class="button">
    Upload Photo to Album
  </a>
  <hr>

  @if(count($album->photos) > 0)
    <?php
      $colcount = count($album->photos);
      $i = 1;
     ?>
  <div id="albums">
    <div class="row text-center">
      @foreach($album->photos as $photo)
        @if($i == $colcount)
          <div class="medium-4 columns end">
            <a href="/photoshow/public/photos/{{ $photo->id }}">
              <img class="thumbnail" src="/photoshow/storage/app/public/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}">
            </a>
            <br>
            <h4>{{ $photo->title }}</h4>
        @else
            <div class="medium-4 columns">
              <a href="/photoshow/public/photos/{{ $photo->id }}">
                <img class="thumbnail" src="/photoshow/storage/app/public/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}">
              </a>
              <br>
              <h4>{{ $photo->title }}</h4>
        @endif
        @if($i % 3 == 0)
          </div>
        </div>
        <div class="row text-center">
        @else
        </div>
        @endif
        <?php $i++; ?>
      @endforeach
    </div>
  </div>
  @else
    <p>No Photos To Display</p>
  @endif
@endsection
