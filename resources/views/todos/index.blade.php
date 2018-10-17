@extends('layouts.app')

@section('content')
  <h1>Todos</h1>
  @if(count($todos) > 0)
    @foreach($todos as $todo)
      <div class="card card-body bg-light">
        <h3>
          <a href="todo/{{$todo->id}}">
            {{ $todo->text }}
            <span class="badge badge-danger" style="width: 100px; font-size: 12px;">
              {{ $todo->due }}
            </span>
          </a>
        </h3>
      </div>
    @endforeach
  @endif
@endsection
