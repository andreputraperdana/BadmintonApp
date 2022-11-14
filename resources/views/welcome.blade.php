<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href={{URL::asset('style.css')}}>
    <title>Login Page</title>
  </head>
  <body>
    <div class="container">
      <div class="background">
        <div class="shape">
          <img class="imeg1" src="{{URL::asset('image1.jpg')}}" alt="" style="">
        </div>
      </div>
      <div class="formLogin" style="">
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
          <form action="/" method="POST">
              @csrf
              <h3>Login Disini</h3>
      
              <label class="usernameText" for="username">Username</label>
              <input type="text" class="username" name="username" placeholder="Username" id="username" required autofocus>
      
              <label class="passwordtext" for="password">Password</label>
              <input type="password" class="password" name="password" placeholder="Password" id="password" required autofocus>
              <button type="submit" class="tombolLogin" id="tombolLogin">Login</button>
          </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  </body>
</html>