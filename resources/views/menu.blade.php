<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="menuHeader" style="margin-top: 50px;">
        <img src="{{URL::asset('image1.jpg')}}" alt="" style="height: 300px; width: 300px; margin-left: 36vw;">
        <div class="menu" style="display: flex; justify-content: center; align-items: center;">
            <a href="/tambahmurid">
                <button class="btn btn-primary" style="margin-right: 50px;">Menu Insert</button>
            </a>
            <a href="/summaryiuran">
                <button class="btn btn-primary" style="margin-right: 50px;">Menu Summary</button>
            </a>
        </div>
    </div>
    
  </body>
</html>