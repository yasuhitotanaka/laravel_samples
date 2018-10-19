<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Tweets</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-primary">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">MyTweets</a>
        </div>
      </div>
    </nav>

    <div class="container">
      <form class="card card-body bg-light" action="{{ route('post.tweet') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        @if(count($errors) > 0)
          @foreach($erross->all() as $error)
            <div class="alert alert-danger">
              {{ $error }}
            </div>
          @endforeach
        @endif

        <div class="form-group">
          <label>Tweet Text</label>
          <input type="text" name="tweet" class="form-control">
        </div>

        <div class="form-group">
          <label>Upload Image</label>
          <input type="file" name="images" multiple>
        </div>

        <div class="form-group">
          <button class="btn btn-success">Create Tweet</button>
        </div>

      </form>
      @if(!empty($data))
        @foreach($data as $key => $tweet)
          <div class="card card-body bg-light">
            <h3>{{ $tweet['text'] }}
              <i class="glyphicon glyphicon-heart"></i> {{ $tweet['favorite_count'] }}
              <i class="glyphicon glyphicon-repeat"></i> {{ $tweet['retweet_count'] }}
            </h3>
            @if(!empty($tweet['extended_entities']['media']))
              @foreach($tweet['extended_entities']['media'] as $i)
                <img src="{{ $i['media_url_https'] }}" style="width=100px;">
              @endforeach
            @endif
          </div>
        @endforeach
      @else
        <p>No Tweets Found...</p>
      @endif
    </div>


  </body>
</html>
