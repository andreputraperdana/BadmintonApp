<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Report Iuran</title>
    <link rel="stylesheet" href={{URL::asset('style.css')}}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    {{-- <script defer src="summarypengeluaran.js"></script> --}}
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index: 999;">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" style="color: white; font-size: 14px;" aria-current="page" href="/tambahmurid">Insert Murid Baru</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: white; font-size: 14px;" href="/iuran">Insert Iuran Murid</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: white; font-size: 14px;" href="/pengeluaran">Insert Pengeluaran</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: white; font-size: 14px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Laporan
              </a>
              <ul class="dropdown-menu" style="background-color: black;">
                <li><a class="dropdown-item" style="color: white" href="/summaryiuran">Summary Iuran Atlet</a></li>
                <li><a class="dropdown-item" style="color: white" href="/summarypengeluaran">Summary Pengeluaran</a></li>
                <li><a class="dropdown-item" style="color: white" href="/summaryall">Summary All</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">  
            <a class="nav-link dropdown-toggle" style="color: white; font-size: 16px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{ auth()->user()->username}}
            </a>
            <ul class="dropdown-menu" >
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i>Log Out</button>
                </form>
              </li>
            </ul>
          </li>
        </ul> 
      </div>
    </nav>
    <div style="max-width: 100vw; display: flex; justify-content: center">
      <div style="width: 90%;">
    <form action="/summarypengeluaran" method="POST">
        @csrf
        <fieldset class="border ps-3" style="width: 700px; border: solid 1px black !important;">
            <legend class="lejen w-auto">Summary Pengeluaran</legend>
            <div class="raja">
              <div class="apaaja">
                <p style="margin: 0 !important;">Periode :</p>
                <input type="month" class="periode" name="periode" id="periode">
              </div>
              <button type="submit" 
                  class="btn btn-primary" 
                  id="btn_simpan" 
                  style="margin: 0; margin-top: 10px; border-radius: 5px; border: none; font-weight: bold; color: white;"
                  >
                    Show Data
                  </button>
            </div>
        </fieldset>
    </form>
    <br>
    <br>
    <table class="table table-bordered border-dark" style="overflow: scroll; max-width: 90vw">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">Periode</th>
                <th scope="col" style="text-align: center;">Jenis Iuran</th>
                <th scope="col" style="text-align: center;">Created At</th>
                <th scope="col" style="text-align: center;">Nominal Iuran</th>
            </tr>
        </thead>
        @foreach ($semua as $semuas)
        <tbody>
          <tr>
            <td style="text-align: center;">{{ $semuas->bulan }}</td>
            <td style="text-align: center;">{{ $semuas->jenis_pengeluaran }}</td>
            <td style="text-align: center;">{{ date('d-m-Y', strtotime($semuas->created_at)) }}</td>
            <td style="text-align: center;">@currency($semuas->nominal_pengeluaran)</td>
          </tr>
        </tbody>
        @endforeach
          <tfoot>
            <tr>
              <td style="text-align: center;">Total</td>
              <td></td> 
              <td></td>
              @foreach ($sumTotal as $sumTotals)
                <td style="text-align: center;">@currency($sumTotals->subTotal)</td>  
              @endforeach  
            </tr>
          </tfoot>
    </table>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  </body>
</html>