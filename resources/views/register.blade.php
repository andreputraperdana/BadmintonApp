<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href={{URL::asset('style.css')}}>
    <script defer src="scriptregister.js"></script>
    <title>Register Page</title>
  </head>
  <body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="formDaftar">
        <form action="/register" method="POST">
            @csrf
            <h3>Daftar Disini</h3>
    
            <label class="usernameText" for="username">Username</label>
            <input type="text" class="username" name="username" placeholder="Username" id="username">
    
            <label class="passwordtext" for="password">Password</label>
            <input type="password" class="password" name="password" placeholder="Password" id="password">

            <div class="form-check pt-3" style="display: flex;">
              <div class="radioAdmin" style="padding-right: 50px;">
                <input class="form-check-input admin" type="radio" value="2" name="roleid" id="roleid" checked>
                <label class="form-check-label" for="inputRadioAdmin">
                  User
                </label>
              </div>
            </div>
              <button type="submit" class="tombolDaftar" id="tombolDaftar">Daftar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <div class="notif_success hidden">
      <div class="notif_text text-center">
        <p>BERHASIL</p>
        <div class="sub_notif_text">
            <p>Akun Berhasil Terdaftar <br> Silahkan</p>
        </div>
      </div>
      <div class="text-center">
          <a href="/">
            <button class="btn btnLogin" id="btnUmkm" style="background-color: #d7caa0;">Login</button>
          </a>
      </div>
  </div>
  <div class="overlay hidden"></div>

  </body>
</html>