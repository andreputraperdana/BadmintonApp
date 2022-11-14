<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iuran Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href={{URL::asset('style.css')}}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
                <a class="nav-link active" style="color: white; font-size: 14px;" href="/iuran">Insert Iuran Murid</a>
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
    @if (auth()->user()->role_id == 1)
      <div class="box" style="margin-top: 10px; margin-bottom: 10px;">
          <form action="/iuran" method="POST">
            @csrf
            <div class="gambaran" style="display: flex; justify-content: center;">
              <img src="{{URL::asset('image1.jpg')}}" alt="" style="height: 150px; width: 200px;">
            </div>
            <fieldset class="border p-3" style="border: solid 1px black !important;">
              <legend class="lejen w-auto">Insert Iuran Murid</legend>
                <table>
                  <tr>
                      <td class="dateFromText" style="width: 150px">Nama Murid</td>
                      <td>:</td>
                      <td>
                        <div class="mantap">
                          <select name="listNama" id="listNama" class="listNama p-2" style="color: black; border-radius: 5px; background-color: white;">
                            @foreach ($listsNama as $listNama)
                              <option value="{{ $listNama->nama_murid }}">{{ $listNama->nama_murid }}</option>  
                            @endforeach
                          </select>
                        </div>
                      </td>
                  </tr>
                  <tr>
                    <td class="dateFromText" style="width: 150px; padding-top: 20px;">Nominal Iuran</td>
                    <td style="padding-top: 20px;">:</td>
                    <td style="padding-top: 20px;">
                      <input type="number" class="nominalIuran" step="0.01" id="nominalIuran" name="nominalIuran" required=""/>
                    </td>
                  </tr>
                </table>
                <button type="submit" class="btn">Add</button> 
            </fieldset>
          </form>
      </div>
    @else
      <h1 style="align-items: center; margin-top: 15vw; text-align: center; color: red;">ANDA TIDAK MENDAPAT AKSES UNTUK MEMBUKA HALAMAN INI, <br> ANDA HANYA MENDAPATKAN AKSES UNTUK SUMMARY</h1>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>