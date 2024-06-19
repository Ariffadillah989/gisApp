<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ruang Rawat Inap</title>
    @livewireStyles
</head>
<body>
<a type="button" class="btn btn-primary" href="/map" text-align="center">Home</a>
  <div class="container py-5">
    <div class="row text-center text-white mb-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4">Ruang Rawat Inap Rumah Sakit TGK Chik Di Tiro Sigli</h1>
        </div>
    </div>
  <div id="kotak1" class="col-md11">
    <form>
    @foreach($ruangs as $ruang)
    <div class="mb-2 row">
      <label for="staticEmail" class="col-sm-2 col-form-label" style="color:white">Kelas</label>
      <div class="col-sm-5">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$ruang ['Kelas']}}" style="color:white">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white">Fasilitas</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="{{$ruang ['Fasilitas1']}}">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="{{$ruang ['Fasilitas2']}}">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="{{$ruang ['Fasilitas3']}}">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="{{$ruang ['Fasilitas4']}}">
      </div>
    </div>
    @if($ruang['Fasilitas5'])
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="{{$ruang ['Fasilitas5']}}">
      </div>
    </div>
    @endif
    @if($ruang['Fasilitas6'])
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="{{$ruang ['Fasilitas6']}}">
      </div>
    </div>
    @endif
    @if($ruang['Fasilitas7'])
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="{{$ruang ['Fasilitas7']}}">
      </div>
    </div>
    @endif
    @if($ruang['Fasilitas8'])
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="{{$ruang ['Fasilitas8']}}">
      </div>
    </div>
    @endif
    @if($ruang['Fasilitas9'])
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="{{$ruang ['Fasilitas9']}}">
      </div>
    </div>
    @endif
    @if($ruang['Fasilitas10'])
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="{{$ruang ['Fasilitas9']}}">
      </div>
    </div>
    @endif
    @endforeach
  </form>
</div>

<!-- proyek lanjutan tambah dan update detail ========================================== -->
<!-- <div id="kotak2" class="col-md8">
  <form>
  <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label" style="color:white"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="inputPassword" value="Contoh Apa saja ">
      </div>
    </div>
  </form>
  </div>
</div> -->

<style>

.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  position: relative;
  left: 5%;
}

body{background: linear-gradient(to right, #c04848, #480048);min-height: 100vh}.text-gray{color: #aaa}img{height: 170px;width: 140px}
#kotak1{
    position: relative;
    top: 70px;
}

#kotak2{
  position: relative;
    top: -1770px;
    left:45%;
}

</style>
    </head>



  @livewireScripts
</body>
</html>