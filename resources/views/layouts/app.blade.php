<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TodoList</title>
    <link rel="stylesheet" href="/todolist/public/css/app.css">
  </head>
  <body>
    @include('inc.navbar')
    <div class="container" style="margin-top: 40px;">
      @include('inc.messages')
      @yield('content')
    </div>
    <footer id="footer" class="text-center">
      <p>Copyright &copy; 2018 TodoList</p>
    </footer>
  </body>
</html>
